/* -----------------------------------
ローディングアニメーション
-------------------------------------*/

// ページリロード時に必ずトップへスクロール
if ('scrollRestoration' in history) {
  history.scrollRestoration = 'manual';
}
window.addEventListener('beforeunload', () => {
  window.scrollTo(0, 0);
});

// ドットアニメーション（.dotが存在する場合のみ）
(() => {
  const dots = document.querySelectorAll('.dot');
  if (dots.length > 0) {
    gsap.to('.dot', {
      opacity: 1,
      stagger: 0.2,
      repeat: -1,
      yoyo: true,
      duration: 0.5,
      ease: 'power1.inOut'
    });
  }
})();

// ページロード後のタイムライン
window.addEventListener('load', () => {

  // トップページ以外ならローディング処理を全部スキップ
  if (!document.querySelector('.loading-screen')) return;


  // 確実にトップへ
  window.scrollTo(0, 0);

  // ローディング中はスクロール禁止
  document.body.style.overflow = 'hidden';

  const tl = gsap.timeline({ delay: 2 });

  tl.set('.wipe-bg', { display: 'block' })
    .to('.wipe-bg', {
      height: '100vh',
      duration: 0.6,
      ease: 'power4.out'
    })
    .to('.loading-screen', {
      opacity: 0,
      duration: 0.3,
      pointerEvents: 'none',
      onComplete: () => {
        document.body.style.overflow = '';
      }
    }, '-=0.3')
    .to('#header', {
      opacity: 1,
      y: 0,
      duration: 0.6,
      ease: 'power2.out'
    }, '-=0.2')
    .to('#hero', {
      opacity: 1,
      y: 0,
      duration: 0.8,
      ease: 'power2.out'
    }, '-=0.4');


  /* -----------------------------------
  タイピング風アニメーション
  -------------------------------------*/

  // カーソル取得して一時退避
  const nameEl = document.querySelector('#hero .mainvisual .name');
  const cursor = nameEl.querySelector('.cursor');
  cursor.remove();

  const splitName = new SplitText('#hero .mainvisual .name', { type: 'chars' });

  nameEl.insertBefore(cursor, splitName.chars[0]);
  cursor.style.animation = 'blink 1s step-end infinite';

  splitName.chars.forEach((char, index) => {
    tl.from(char, {
      opacity: 0,
      duration: 0.05,
      ease: 'none'
    }, index === 0 ? undefined : '+=0.1')
    .add(() => {
      if (splitName.chars[index + 1]) {
        nameEl.insertBefore(cursor, splitName.chars[index + 1]);
      } else {
        nameEl.appendChild(cursor);
      }
    });
  });

  // title
  const titleEl = document.querySelector('#hero .subvisual .title');
  if (titleEl) {
    const splitTitle = new SplitText(titleEl, { type: 'chars' });
    tl.add(() => {
      titleEl.insertBefore(cursor, splitTitle.chars[0]);
    }, '+=0.3');
    splitTitle.chars.forEach((char, index) => {
      tl.from(char, {
        opacity: 0,
        duration: 0.05,
        ease: 'none'
      }, '+=0.01')
      .add(() => {
        if (splitTitle.chars[index + 1]) {
          titleEl.insertBefore(cursor, splitTitle.chars[index + 1]);
        } else {
          titleEl.appendChild(cursor);
        }
      });
    });
  }

  // text
  const textEl = document.querySelector('#hero .subvisual .text');
  if (textEl) {
    const splitText = new SplitText(textEl, { type: 'chars' });
    tl.add(() => {
      textEl.insertBefore(cursor, splitText.chars[0]);
    }, '+=0.3');
    splitText.chars.forEach((char, index) => {
      tl.from(char, {
        opacity: 0,
        duration: 0.05,
        ease: 'none'
      }, '+=0.01')
      .add(() => {
        if (splitText.chars[index + 1]) {
          textEl.insertBefore(cursor, splitText.chars[index + 1]);
        } else {
          textEl.appendChild(cursor);
        }
      });
    });
  }

  

});


/* -----------------------------------
ハンバーガメニュー
-------------------------------------*/
(() => {
  const hamburger = document.querySelector('header .hamburger');
  const nav = document.querySelector('header nav');
  const mask = document.querySelector('header .mask');
  const lists = document.querySelectorAll('header nav li');

  if (!hamburger || !nav || !mask) return;

  let isNavOpen = false;

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    nav.classList.toggle('active');
    mask.classList.toggle('active');
    isNavOpen = !isNavOpen;

    if (isNavOpen) {
      gsap.fromTo(lists, 
        { 
          opacity: 0, 
          x: 40 
        },
        { 
          delay: 0.5,
          opacity: 1, 
          x: 0, 
          duration: 1.5, 
          stagger: 0.5,
          ease: 'power2.out'
        }
      );
    } else {
      gsap.to(lists, {
        opacity: 0,
        duration: 0.3
      });
    }
  });

  lists.forEach((list) => {
    list.addEventListener('click', () => {
      hamburger.classList.remove('active');
      nav.classList.remove('active');
      mask.classList.remove('active');
      isNavOpen = false;
    });
  });
})();


/* -----------------------------------
worksスクロールアニメーション
-------------------------------------*/
(() => {
  gsap.registerPlugin(ScrollTrigger);

  let mm = gsap.matchMedia();

  // 764px 以上のときだけアニメーション有効
  mm.add("(min-width: 765px)", () => {
    const section = document.querySelector("#works .stagedReveal");
    const items = gsap.utils.toArray("#works .stagedReveal-content");

    if (!section || items.length === 0) return;

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top top",
        end: "+=400%",
        pin: true,
        scrub: 0.5
      }
    });

    items.forEach((item) => {
      tl.to(item, { y: "-47%", duration: 1 });
      tl.to(item, { scale: 0.5, duration: 1 });
    });

    // return でクリーンアップ（画面幅変更時に破棄）
    return () => {
      tl.scrollTrigger?.kill();
      tl.kill();
    };
  });
})();


/* -----------------------------------
リサイズ時リロード（トップページのみ、スマホ除外）
-------------------------------------*/
(() => {
  if (!document.querySelector('.loading-screen')) return;

  let resizeTimer;
  let lastInnerWidth = window.innerWidth;

  window.addEventListener("resize", () => {
    // スマートフォンのスクロール時のリサイズを無視
    // （ビューポート幅が変わっていない場合はリロード処理をスキップ）
    if (window.innerWidth === lastInnerWidth) {
      return;
    }

    lastInnerWidth = window.innerWidth;
    clearTimeout(resizeTimer);

    resizeTimer = setTimeout(() => {
      location.reload();
    }, 150);
  });
})();


/* -----------------------------------
トップへ戻るボタン
-------------------------------------*/
(() => {
  // DOMContentLoadedの中で実行することで、HTMLの読み込みを確実に待つ
  document.addEventListener('DOMContentLoaded', () => {
    const circle = document.querySelector('.circle');

    // circleが存在しないページでは、以下の処理を一切行わない
    if (!circle) return;

    // スクロール監視
    window.addEventListener('scroll', () => {
      const threshold = window.innerHeight;
      if (window.scrollY >= threshold) {
        circle.classList.add('visible');
      } else {
        circle.classList.remove('visible');
      }
    });

    // クリックイベント
    circle.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  });
})();


/* -----------------------------------
.fadein スクロールアニメーション
-------------------------------------*/
gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
  const fades = document.querySelectorAll('.fadein');
  if (!fades.length) return;

  fades.forEach((el, index) => {
    gsap.fromTo(el,
      { opacity: 0, y: 50 },
      {
        opacity: 1,
        y: 0,
        duration: 0.8,
        delay: index * 0.25,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: el,
          start: 'top 80%',
          toggleActions: 'play none none none'
        }
      }
    );
  });
});


/* -----------------------------------
modal画像拡大表示
-------------------------------------*/
document.addEventListener('DOMContentLoaded', () => {
  // モーダル要素
  const modal = document.getElementById('imgModal');
  const modalImg = document.getElementById('modalImg');

  // モーダルが存在しない場合は処理をスキップ
  if (!modal || !modalImg) return;

  const closeBtn = modal.querySelector('.close');
  // クリック対象画像
  const images = document.querySelectorAll('.img-pc img, .img-sp img');

  // 画像クリック → モーダル表示
  images.forEach(img => {
    img.addEventListener('click', () => {
      modal.style.display = 'flex';
      modalImg.src = img.src;
    });
  });

  // 閉じるボタン（存在する場合のみ）
  if (closeBtn) {
    closeBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      modal.style.display = 'none';
    });
  }

  // モーダル背景クリックで閉じる
  modal.addEventListener('click', e => {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });
});






