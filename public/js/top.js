$(function() {
	setTimeout(function(){
		$('.sdgs1, .sdgs19, .sdgs20, .sdgs21, .sdgs22, .sdgs23, .sdgs24, .sdgs25, .sdgs26, .sdgs27, .sdgs28, .sdgs29, .sdgs30, .sdgs31, .sdgs32, .sdgs33, .sdgs34').fadeOut(2000);
	},2800);
});

$(function() {
	setTimeout(("load", function() {
    $('.sdgs36').fadeIn(0); 
  }),3100);
});

$(function() {
	setTimeout(("load", function() {
    $('.hana').fadeIn(1000); 
  }),3200);
});

window.addEventListener("scroll", function () {
  const b = document.querySelector(".b");
  const scroll = window.scrollY;
  if (window.matchMedia( "(max-width: 481px)" ).matches) {
    if (scroll > 10) {
      b.style.opacity = "1";
    } else {
      b.style.opacity = "0";
    }
  } else {
    if (scroll > 300) {
      b.style.opacity = "1";
    } else {
      b.style.opacity = "0";
    }  
  }
});

window.addEventListener("scroll", function () {
  const c = document.querySelector(".c");
  const scroll = window.scrollY;
  if (window.matchMedia( "(max-width: 481px)" ).matches) {
    if (scroll > 200) {
      c.style.opacity = "1";
    } else {
      c.style.opacity = "0";
    }
  } else {
    if (scroll > 600) {
      c.style.opacity = "1";
    } else {
      c.style.opacity = "0";
    }
  }
});

window.addEventListener('scroll', () => {
  const element = document.querySelector('.sdgs12');
  const scroll = window.scrollY;
  // const position = element.getBoundingClientRect().top;
  // const screenHeight = window.innerHeight;

  // if (position < screenHeight * 0.75) { // 画面の下から3/4の位置までスクロールした時にクラス名を追加
  if (window.matchMedia( "(max-width: 481px)" ).matches) {
    if (scroll > 200) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  } else {
    if (scroll > 600) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  }
});

window.addEventListener('scroll', () => {
  const element = document.querySelector('.sdgs13');
  const scroll = window.scrollY;
  if (window.matchMedia( "(max-width: 481px)" ).matches) {
    if (scroll > 200) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  } else {
    if (scroll > 600) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  }
});

window.addEventListener('scroll', () => {
  const element = document.querySelector('.sdgs14');
  const scroll = window.scrollY;
  if (window.matchMedia( "(max-width: 481px)" ).matches) {
    if (scroll > 200) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  } else {
    if (scroll > 600) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  }
});

window.addEventListener('scroll', () => {
  const element = document.querySelector('.sdgs15');
  const scroll = window.scrollY;
  if (window.matchMedia( "(max-width: 481px)" ).matches) {
    if (scroll > 200) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  } else {
    if (scroll > 600) {
      element.classList.remove('remove');
      element.classList.add('show');
    } else {
      element.classList.remove('show');
      element.classList.add('remove');
    }
  }
});

window.addEventListener("scroll", function () {
  const b = document.querySelector(".d");
  const scroll = window.scrollY;
  if (window.matchMedia( "(max-width: 768px)" ).matches) {
    if (scroll > 500) {
      b.style.opacity = "1";
    } else {
      b.style.opacity = "0";
    }
  } else {
    if (scroll > 1000) {
      b.style.opacity = "1";
    } else {
      b.style.opacity = "0";
    }
  }
});