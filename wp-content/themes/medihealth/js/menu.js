(function() {
	// Check if target matches to an element.
	function medihealthTargetMatches(selector) {
		return event.target.matches ? event.target.matches(selector) : event.target.msMatchesSelector(selector);
	}

	// Get next sibling.
	function medihealthNextSibling(element) {
		do {
			element = element.nextSibling;
		} while (element && element.nodeType !== 1);
		return element;
	}

	// Handle sub-menu arrow clicks.
	function medihealthSubMenuArrowClick(subMenuArrow, subMenuArrows, subMenus) {
		var medihealthSubMenu = medihealthNextSibling(subMenuArrow);
		if(medihealthSubMenu) {
			// Accessibility support for dropdown menu.
			var medihealthSubMenuLink = subMenuArrow.previousSibling;

			medihealthSetTabIndex(subMenus, -1);

			if(medihealthSubMenu.classList.contains('sub-menu--open')) {
				subMenuArrow.classList.remove('sub-menu-show');
				medihealthSubMenu.classList.remove('sub-menu--open');
				medihealthSubMenuLink.setAttribute('aria-expanded', 'false');
				subMenuArrow.getElementsByClassName('menu-arrow-button-hide')[0].setAttribute('aria-hidden', 'true');
				subMenuArrow.getElementsByClassName('menu-arrow-button-show')[0].setAttribute('aria-hidden', 'false');
			} else {
				if(subMenus.length) {
					[].forEach.call(subMenus, function(el) {
						el.classList.remove('sub-menu--open');
					});
				}
				if(subMenuArrows.length) {
					for(var i = 0; i < subMenuArrows.length; i++) {
						subMenuArrows[i].classList.remove('sub-menu-show');
						subMenuArrows[i].previousSibling.setAttribute('aria-expanded', 'false');
						subMenuArrows[i].getElementsByClassName('menu-arrow-button-hide')[0].setAttribute('aria-hidden', 'true');
						subMenuArrows[i].getElementsByClassName('menu-arrow-button-show')[0].setAttribute('aria-hidden', 'false');
					}
				}

				subMenuArrow.classList.add('sub-menu-show');
				medihealthSubMenu.classList.add('sub-menu--open');
				medihealthSubMenuLink.setAttribute('aria-expanded', 'true');
				subMenuArrow.getElementsByClassName('menu-arrow-button-hide')[0].setAttribute('aria-hidden', 'false');
				subMenuArrow.getElementsByClassName('menu-arrow-button-show')[0].setAttribute('aria-hidden', 'true');
				medihealthSetTabIndex(medihealthSubMenu, 0);
				medihealthSetTabIndex(medihealthSubMenu.querySelectorAll('.sub-menu'), -1);
			}
		}
	}

	// Setup mobile menu.
	function medihealthMobileMenu() {
		document.addEventListener('click', function(event) {
			if(medihealthTargetMatches('.menu-toggle')) {
				event.preventDefault();
				var medihealthNavIcon = event.target || event.srcElement;
				var medihealthMainNav = document.querySelector('.main-navigation > .primary-menu-container');

				// Slide mobile menu.
				medihealthNavIcon.classList.toggle('menu-toggle--open');
				medihealthMainNav.classList.toggle('primary-menu-container--open');

				if(medihealthNavIcon.classList.contains('menu-toggle--open')) {
					medihealthNavIcon.setAttribute('aria-expanded', 'true');
					medihealthSetTabIndex(document.querySelector('.main-navigation .menu'), 0);
					medihealthSetTabIndex(document.querySelectorAll('.main-navigation .sub-menu'), -1);
				} else {
					medihealthNavIcon.setAttribute('aria-expanded', 'false');
				}

			} else if(medihealthTargetMatches('.main-navigation .menu .sub-menu li.menu-item-has-children > .menu-arrow-button')) {
				event.preventDefault();
				var medihealthSubMenuArrow1 = event.target || event.srcElement;

				var medihealthSubMenuArrows1 = document.querySelectorAll('.main-navigation .menu .sub-menu > li.menu-item-has-children > .menu-arrow-button');
				var medihealthSubMenus1 = document.querySelectorAll('.main-navigation .menu .sub-menu > li.menu-item-has-children > .sub-menu');

				medihealthSubMenuArrowClick(medihealthSubMenuArrow1, medihealthSubMenuArrows1, medihealthSubMenus1);

			} else if(medihealthTargetMatches('.main-navigation .menu li.menu-item-has-children > .menu-arrow-button')) {
				event.preventDefault();
				var medihealthSubMenuArrow2 = event.target || event.srcElement;

				var medihealthSubMenuArrows2 = document.querySelectorAll('.main-navigation .menu > li.menu-item-has-children > .menu-arrow-button');
				var medihealthSubMenus2 = document.querySelectorAll('.main-navigation .menu > li.menu-item-has-children > .sub-menu');

				medihealthSubMenuArrowClick(medihealthSubMenuArrow2, medihealthSubMenuArrows2, medihealthSubMenus2);

			} else {
				var medihealthSubMenuArrows3 = document.querySelectorAll('.main-navigation .menu > li.menu-item-has-children > .menu-arrow-button');
				var medihealthSubMenus3 = document.querySelectorAll('.main-navigation .menu > li.menu-item-has-children > .sub-menu');
				if(medihealthSubMenus3.length) {
					[].forEach.call(medihealthSubMenus3, function(el) {
						el.classList.remove('sub-menu--open');
					});
				}
				if(medihealthSubMenuArrows3.length) {
					for(var i = 0; i < medihealthSubMenuArrows3.length; i++) {
						medihealthSubMenuArrows3[i].classList.remove('sub-menu-show');
						medihealthSubMenuArrows3[i].previousSibling.setAttribute('aria-expanded', 'false');
						medihealthSubMenuArrows3[i].getElementsByClassName('menu-arrow-button-hide')[0].setAttribute('aria-hidden', 'true');
						medihealthSubMenuArrows3[i].getElementsByClassName('menu-arrow-button-show')[0].setAttribute('aria-hidden', 'false');
					}
				}
				medihealthSetTabIndex(document.querySelectorAll('.main-navigation .sub-menu'), -1);
			}
		});
	}

	// Mobile menu.
	medihealthMobileMenu();

	var medihealthFocusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';

	// Set tabindex of focusable elements.
	function medihealthSetTabIndex(element, value) {
		if(NodeList.prototype.isPrototypeOf(element)) {
			[].forEach.call(element, function(el) {
				[].forEach.call(el.querySelectorAll(medihealthFocusableElements), function(el) {
					el.setAttribute('tabindex', value);
				});
			});

		} else {
			[].forEach.call(element.querySelectorAll(medihealthFocusableElements), function(el) {
				el.setAttribute('tabindex', value);
			});
		}
	}

	medihealthSetTabIndex(document.querySelectorAll('.main-navigation .sub-menu'), -1);

	document.addEventListener('keydown', function(event) {
		var medihealthIsTabPressed = ('Tab' === event.key || 9 === event.keyCode);
		if(!medihealthIsTabPressed) {
			return;
		}

		var medihealthNavIcon = document.querySelector('.menu-toggle');
		if(medihealthNavIcon && ('none' !== getComputedStyle(medihealthNavIcon, null).display)) {
			if(!medihealthNavIcon.classList.contains('menu-toggle--open')) {
				medihealthSetTabIndex(document.querySelector('.main-navigation .menu'), -1);
			}

			if(!event.shiftKey) {
				if(!document.activeElement.classList || !document.activeElement.classList.contains('sub-menu-show')) {
					var medihealthActiveElementArrow = medihealthNextSibling(document.activeElement);
					if(!medihealthActiveElementArrow || (medihealthActiveElementArrow.classList && !medihealthActiveElementArrow.classList.contains('menu-arrow-button'))) {
						var medihealthActiveElementSibling = medihealthNextSibling(document.activeElement.parentNode);
						if(!medihealthActiveElementSibling && document.activeElement.parentNode.parentNode.id && 'primary-menu' === document.activeElement.parentNode.parentNode.id) {
							var medihealthMenuFocusableElements = document.activeElement.parentNode.parentNode.querySelectorAll(medihealthFocusableElements);
							if(medihealthMenuFocusableElements.length > 0) {
								event.preventDefault();
								medihealthNavIcon.focus();
							}
						}
					}
				}
			} else {
				if(document.activeElement.classList && document.activeElement.classList.contains('menu-toggle--open')) {
					var medihealthLastMenuItemArrowButton = document.querySelector('.main-navigation .menu > li:last-child > .menu-arrow-button');
					if(medihealthLastMenuItemArrowButton) {
						medihealthLastMenuItemArrowButton.focus();
						event.preventDefault();
					} else {
						var medihealthLastMenuItemAnchor = document.querySelector('.main-navigation .menu > li:last-child > a');
						if(medihealthLastMenuItemAnchor) {
							medihealthLastMenuItemAnchor.focus();
							event.preventDefault();
						}
					}
				}
			}
		}

		if(!event.shiftKey) {
			if(!document.activeElement.classList || !document.activeElement.classList.contains('sub-menu-show')) {
				var medihealthActiveElementArrow = medihealthNextSibling(document.activeElement);
				if(!medihealthActiveElementArrow || (medihealthActiveElementArrow.classList && !medihealthActiveElementArrow.classList.contains('menu-arrow-button'))) {
					var medihealthActiveElementSibling = medihealthNextSibling(document.activeElement.parentNode);
					if(!medihealthActiveElementSibling && document.activeElement.parentNode.parentNode.classList && document.activeElement.parentNode.parentNode.classList.contains('sub-menu--open')) {
						var subMenuFocusableElements = document.activeElement.parentNode.parentNode.querySelectorAll(medihealthFocusableElements);
						if(subMenuFocusableElements.length > 0) {
							event.preventDefault();
							subMenuFocusableElements[0].focus();
						}
					}
				}
			}
		}
	});

	// Sticky menu.
	var medihealthMainMenuSticky = document.querySelector('.site-menu-content--sticky');
	if(medihealthMainMenuSticky) {
		var medihealthAfterMainMenu = medihealthNextSibling(medihealthMainMenuSticky);
		if(medihealthAfterMainMenu) {
			var medihealthSiteContent = medihealthAfterMainMenu;
		} else {
			var medihealthSiteContent = document.querySelector('.site-content');
		}

		var medihealthSiteContentMarginTop = window.getComputedStyle(medihealthSiteContent).marginTop;

		var medihealthStickyMenuHeight = medihealthMainMenuSticky.offsetHeight;
		var medihealthStickyMenuClass = 'sticky-menu';
		var medihealthContainerMenuClass = 'container';
		var medihealthStickyMenuInViewClass = 'sticky-menu-in-view';
		var medihealthHeaderHeight = document.querySelector('.site-header').offsetHeight;
		window.addEventListener('scroll', function() {
			if(window.pageYOffset > medihealthHeaderHeight) {
				medihealthMainMenuSticky.classList.add(medihealthStickyMenuClass);
				medihealthSiteContent.style.marginTop = medihealthStickyMenuHeight + 'px';
			} else {
				medihealthMainMenuSticky.classList.remove(medihealthStickyMenuClass);
				medihealthSiteContent.style.marginTop = medihealthSiteContentMarginTop;
			}
			if(window.pageYOffset > (medihealthHeaderHeight * 3)) {
				medihealthMainMenuSticky.classList.add(medihealthStickyMenuInViewClass);
				medihealthMainMenuSticky.classList.remove(medihealthContainerMenuClass);
			} else {
				medihealthMainMenuSticky.classList.remove(medihealthStickyMenuInViewClass);
				medihealthMainMenuSticky.classList.add(medihealthContainerMenuClass);
			}
		});
	}

	// Utility function.
	function medihealthUtil() {}

	// Smooth scroll.
	medihealthUtil.scrollTo = function(final, duration, cb) {
		var medihealthStart = window.scrollY || document.documentElement.scrollTop,
			medihealthCurrentTime = null;

		var medihealthAnimateScroll = function(timestamp) {
			if(!medihealthCurrentTime) {
				medihealthCurrentTime = timestamp;
			}

			var medihealthProgress = timestamp - medihealthCurrentTime;

			if(medihealthProgress > duration) {
				medihealthProgress = duration;
			}

			var medihealthVal = Math.easeInOutQuad(medihealthProgress, medihealthStart, final - medihealthStart, duration);

			window.scrollTo(0, medihealthVal);
			if(medihealthProgress < duration) {
				window.requestAnimationFrame(medihealthAnimateScroll);
			} else {
				cb && cb();
			}
		};

		window.requestAnimationFrame(medihealthAnimateScroll);
	};

	// Animation curves.
	Math.easeInOutQuad = function (t, b, c, d) {
		t /= d/2;
		if(t < 1) return c/2*t*t + b;
		t--;
		return -c/2 * (t*(t-2) - 1) + b;
	};

	// Back to top.
	var medihealthBackTop = document.querySelector('.back-to-top');
	if(medihealthBackTop) {
		var medihealthOffset = 300;
		var medihealthOffsetOpacity = 1200;
		var medihealthScrollDuration = 700;
		var medihealthScrolling = false;
		window.addEventListener('scroll', function() {
			if(!medihealthScrolling) {
				medihealthScrolling = true;
				(!window.requestAnimationFrame) ? setTimeout(medihealthCheckBackToTop, 250) : window.requestAnimationFrame(medihealthCheckBackToTop);
			}
		});

		document.addEventListener('click', function(event) {
			if(medihealthTargetMatches('.back-to-top')) {
				event.preventDefault();
				(!window.requestAnimationFrame) ? window.scrollTo(0, 0) : medihealthUtil.scrollTo(0, medihealthScrollDuration);
			}
		});
	}

	function medihealthCheckBackToTop() {
		var medihealthWindowTop = window.scrollY || document.documentElement.scrollTop;
		( medihealthWindowTop > medihealthOffset ) ? medihealthBackTop.classList.add('back-to-top--show') : medihealthBackTop.classList.remove('back-to-top--show', 'back-to-top--fade-out');
		( medihealthWindowTop > medihealthOffsetOpacity ) && medihealthBackTop.classList.add('back-to-top--fade-out');
		medihealthScrolling = false;
	}

})();
