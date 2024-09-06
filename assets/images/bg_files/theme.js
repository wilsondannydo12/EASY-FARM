"use strict";

jQuery(document).ready(function ($) {
  //AJAX request for category selections
  $('form.staff-filter input').on('change', function () {
    var inputs = $('form.staff-filter input');
    var current = $(this);
    inputs.each(function (i) {
      if (!$(inputs[i]).is(current)) {
        $(inputs[i]).prop('checked', false);
        $(inputs[i]).removeAttr('checked');
      }
    });
    getStaffMembers();
  });

  function getStaffMembers() {
    //Set loading states
    $('form.staff-filter :input').prop('disabled', true);
    $('.adobo-container>.grid').addClass('loading'); //Get Selected Terms

    var tax_slugs = [];
    var inputs = $('form.staff-filter input:checked');
    inputs.each(function (i) {
      var value = $(inputs[i]).val();

      if (value !== 'all-staff') {
        tax_slugs.push(value);
      }
    }); //Get the posts

    $.ajax({
      type: 'GET',
      dataType: 'html',
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'get_staff_by_tax',
        tax_slugs: tax_slugs
      },
      success: function success(res) {
        $('.adobo-container>.grid').html(res); //Unset loading states

        $('form.staff-filter :input').prop('disabled', false);
        $('.adobo-container>.grid').removeClass('loading');
      }
    });
  }
});
"use strict";

/**
 * Animation JavaScript
 *
 * @since 1.0.0
 */
gsap.registerPlugin(DrawSVGPlugin);
gsap.registerPlugin(SplitText);
document.addEventListener('DOMContentLoaded', function () {
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  }
  /**
   *
   * Default reveal animations
   *
   */


  var revealItems = document.querySelectorAll('[data-reveal]');

  if (revealItems) {
    revealItems.forEach(function (item) {
      var effect = item.dataset.reveal; //Set params

      var params = {
        scrollTrigger: {
          trigger: item,
          start: 'center bottom',
          end: 'center top'
        },
        duration: 1,
        opacity: 0,
        ease: 'expo.out'
      }; //Set effect type

      if (effect == 'fromLeft') params.x = -100;
      if (effect == 'fromRight') params.x = 100;
      if (effect == 'fromTop') params.y = -100;
      if (effect == 'fromBottom') params.y = 100;
      if (effect == 'scaleIn') params.scale = 0.1;
      if (effect == 'fadeIn') params.duration = 2;
      gsap.from(item, params);
    });
  }
  /**
   *
   * Counter animations
   *
   */


  var countItems = document.querySelectorAll('[data-countup]');

  if (countItems) {
    countItems.forEach(function (item) {
      var snapVal = 1;
      var n = parseFloat(item.dataset.countup);

      if (item.innerText.includes('.')) {
        snapVal = 0.1;
      } else if (item.innerText.includes(',')) {
        n = parseInt(item.dataset.countup.replace(/,/g, ''));
      }

      gsap.fromTo(item, {
        innerText: 0
      }, {
        scrollTrigger: item,
        innerText: n,
        snap: {
          innerText: snapVal
        },
        duration: 2,
        ease: 'circ.out',
        onUpdate: function onUpdate() {
          this.targets().forEach(function (target) {
            var val = gsap.getProperty(target, 'innerText');
            target.innerText = numberWithCommas(val);
          });
        }
      });
    });
  }
  /**
   *
   * TEMPLATE 1 / HOME PAGE ANIMATIONS
   *
   */


  if (document.querySelector('body.home')) {
    //Caraway / Home Hero animations
    var carawayText = gsap.timeline({
      defaults: {
        duration: 3,
        ease: 'expo'
      }
    });
    var carawayImages = gsap.timeline({
      defaults: {
        duration: 3,
        ease: 'expo',
        opacity: 0
      }
    });
    carawayText.to('.first-text span', {
      y: 0,
      opacity: 1,
      stagger: 0.65
    }).to('.first-text .highlight', {
      color: '#FFBC38',
      borderColor: '#FFBC38'
    }).from('.first-text .border', {
      width: 0
    }, '>-1.5').to('.first-text span', {
      opacity: 0,
      stagger: 0.5
    }, '>-1.8').to('.first-text', {
      duration: 0,
      height: 0
    }).to('.final-text > *', {
      y: 0,
      opacity: 1,
      stagger: 0.65
    }).to('.caraway-btn', {
      opacity: 1,
      y: 0,
      duration: 1
    }, '>-0.5');
    var imageSets = document.querySelectorAll('.image-set');
    imageSets.forEach(function (set) {
      var overlay = set.querySelector('.overlay, .svg-overlay');
      var imgs = set.querySelectorAll('img');
      carawayImages.to(overlay, {
        stagger: {
          each: 1,
          from: 'random'
        }
      }).to(imgs, {
        opacity: 1
      }, 0);
    });
  }
  /**
   *
   * TEMPLATE 3 ANIMATIONS
   *
   */


  if (document.querySelector('body.page-template-our-role')) {
    //Food Systems Graphics
    var foodSystems = gsap.timeline({
      scrollTrigger: {
        trigger: 'section.food-system',
        start: 'center bottom',
        end: 'center top'
      },
      defaults: {
        duration: 1,
        ease: 'expo.out',
        y: 50,
        opacity: 0
      }
    });
    var offset = '>-0.9';
    foodSystems.from('#food-systems #food-box', {
      y: 100
    }).from('#food-systems #food-system-2', {}, offset).from('#food-systems #food-system-3', {}, offset).from('#food-systems #food-system-4', {}, offset).from('#food-systems #food-system-5', {}, offset).from('#food-systems #food-system-6', {}, offset).from('#food-systems #food-system-7', {}, offset).from('#food-systems #food-system-8', {}, offset).from('#food-systems #arms path', {
      y: 0,
      stagger: -0.1
    }, '<').fromTo('#food-systems #circle-border', {
      y: 0,
      duration: 2,
      opacity: 1,
      drawSVG: '35% 35%'
    }, {
      y: 0,
      duration: 2,
      opacity: 1,
      drawSVG: '35% -65%'
    }, '<+0.75'); //Globe section

    var globeClouds = gsap.timeline({
      defaults: {
        scrollTrigger: {
          scrub: 2
        }
      }
    });
    globeClouds.from('.globe #cloud_1', {
      x: 700
    }).from('.globe #cloud_2', {
      x: 600
    }).from('.globe #cloud_3', {
      x: 500
    }).from('.globe #cloud_4', {
      x: 200
    }).from('.globe #cloud_5', {
      x: 300
    });
    var globePeople = gsap.timeline({
      scrollTrigger: {
        trigger: 'section.globe',
        start: 'center bottom',
        end: 'center top'
      },
      defaults: {
        duration: 0.25,
        scale: 0,
        opacity: 0,
        stagger: 0.05
      }
    });
    globePeople.from('#People g', {});
    var globeIcons = gsap.timeline({
      scrollTrigger: {
        trigger: 'section.globe',
        start: 'center bottom-=100px',
        end: 'center top'
      },
      defaults: {
        duration: 2,
        stagger: 0.25,
        drawSVG: 0,
        ease: 'expo'
      }
    });
    globeIcons.from('.globe-headings g#line path', {}); //Surplus

    var surplus = gsap.timeline({
      scrollTrigger: {
        trigger: 'svg#surplus',
        start: 'center bottom-=150px',
        end: 'center top'
      },
      defaults: {
        drawSVG: 0,
        duration: 1
      }
    });
    surplus.from('.solution-intro', {
      opacity: 0,
      scale: 0.8
    }).from('h4.solution-heading', {
      opacity: 0
    }, '>-0.5').from('#surplus #right', {}, 0).from('#surplus #left', {}, 0).from('#surplus #vertical', {
      duration: 0.5
    }, 0.5); //Solutions section

    var store = gsap.timeline({
      scrollTrigger: {
        trigger: 'svg#store',
        start: 'center bottom-=100px',
        end: 'center top'
      },
      defaults: {
        duration: 0.25,
        y: -25,
        opacity: 0,
        ease: 'sine',
        stagger: 0.05
      }
    });
    store.from('g#Box', {
      y: 100,
      duration: 1,
      ease: 'expo'
    }).from('g#shelf-items path', {}, '>-0.5').from('g#Van', {
      y: 0,
      x: -100,
      duration: 0.75
    }, '>-0.75').from('#down-arrow', {
      y: -75
    }, 0); //Community section

    var communityClouds = gsap.timeline({
      defaults: {
        scrollTrigger: {
          scrub: 2
        }
      }
    });
    communityClouds.from('#community #cloud', {
      x: -400
    }).from('#community #cloud_2', {
      x: -600
    }).from('#community #cloud_3', {
      x: -750
    }).fromTo('#community #cloud_4', {
      x: -50
    }, {
      x: 100
    });
    gsap.from('path#sun', {
      y: 200,
      scale: 0.8,
      ease: 'expo',
      duration: 8,
      scrollTrigger: {
        trigger: 'svg#community',
        start: 'center bottom-=100px',
        end: 'center top'
      }
    });
    /*
    	let communityBuildings = gsap.timeline({
    	defaults: {
    		duration: 1,
    		ease: 'expo.out',
    		y: -100,
    		opacity: 0,
    		stagger: 0.15
    	},
    	scrollTrigger: {
    		trigger: 'svg#community',
    		start: 'center bottom-=100px',
    		end: 'center top'
    	}
    });
    	communityBuildings.from('#community #buildings g', {}, 0);
    */
    //Redistribute

    var redistribute = gsap.timeline({
      scrollTrigger: {
        trigger: 'svg#redistribute',
        start: 'center bottom-=150px',
        end: 'center top'
      },
      defaults: {
        drawSVG: 0,
        duration: 1
      }
    });
    redistribute.from('#redistribute #icons>g, #redistribute #text>path', {
      scale: 0.85,
      opacity: 0,
      stagger: -0.15
    }, 0).from('#redistribute #right_2 path', {}, '>').from('#redistribute #left_2 path', {}, '<').from('#redistribute #inner path', {
      duration: 0.85
    }, '<+0.15'); //Icons

    var roleIcons = gsap.timeline({
      scrollTrigger: {
        trigger: '.role-grid',
        start: 'center bottom-=100px',
        end: 'center top'
      },
      defaults: {
        duration: 1,
        ease: 'expo.out',
        y: -100,
        opacity: 0,
        stagger: 0.15
      }
    });
    roleIcons.from('.role-grid img', {}, 0);
  }
});
"use strict";

jQuery(document).ready(function ($) {
  $('.term-select-title').on('click', function (e) {
    e.stopPropagation();
    $(this).toggleClass('is-active');
    $(this).next('.term-select').slideToggle();
    $(this).find('.select-arrow svg').toggleClass('flipped');
  }); //Close filter drop down

  $(document).bind('click', function (e) {
    if (!$(e.target).is('.term-select-title.is-active + ul li')) {
      var el = $('.term-select-title.is-active');
      $(el).next('.term-select').slideToggle();
      $(el).removeClass('is-active');
      $(el).find('.select-arrow svg').removeClass('flipped');
    }
  });
  $('ul.term-select li.term').on('click', function () {
    $(this).toggleClass('selected');
    getFilteredPosts();
  });
  $('form.post-search-form').on('submit', function (e) {
    e.preventDefault();
    getFilteredPosts();
  });

  function getFilteredPosts() {
    var paged = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
    var dropdown = $('ul.term-select');
    var postType = $(dropdown).data('post-type');
    var postsWrapper = $('.cumin-posts');
    $(postsWrapper).toggleClass('loading'); //Get selected terms

    var taxQuery = [];
    $('ul.term-select').each(function () {
      var tax = $(this).data('tax');
      var selectedTerms = [];
      $(this).children('.selected').each(function () {
        var slug = $(this).data('term-slug');
        selectedTerms.push(slug);
      });

      if (selectedTerms.length) {
        taxQuery.push({
          taxonomy: tax,
          field: 'slug',
          terms: selectedTerms
        });
      }
    }); //Get search text

    var searchInput = $('form.post-search-form input');
    var searchText = '';

    if (searchInput) {
      searchText = $(searchInput).val();
    }

    $.ajax({
      type: 'GET',
      dataType: 'html',
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'get_filtered_posts',
        post_type: postType,
        tax_query: taxQuery,
        search_term: searchText,
        paged: paged
      },
      success: function success(res) {
        $(postsWrapper).html(res);
        updatePagination(postType, taxQuery, searchText, paged);
        $(postsWrapper).toggleClass('loading');
      },
      error: function error(res) {
        console.error(res);
      }
    });
  } //Update Pagination after posts are filtered


  function updatePagination(postType, taxQuery, searchText, paged) {
    $.ajax({
      type: 'GET',
      dataType: 'html',
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'update_pagination',
        post_type: postType,
        tax_query: taxQuery,
        search_term: searchText,
        paged: paged,
        base: window.location.pathname + window.location.search
      },
      success: function success(res) {
        $('.posts-pagination').html(res);
        $([document.documentElement, document.body]).animate({
          scrollTop: $('.posts-filter').offset().top
        }, 300);
      },
      error: function error(res) {
        console.error(res);
      }
    });
  } //AJAX page change


  $('body:not(.search)').on('click', '.posts-pagination a:not(.next):not(.prev)', function (e) {
    e.preventDefault();
    var pageNum = e.currentTarget.innerText;
    getFilteredPosts(pageNum);
  }); //Next button clicked

  $('body:not(.search)').on('click', '.posts-pagination a.next', function (e) {
    e.preventDefault();
    var currentPage = $('span.page-numbers.current').html();
    var pageNum = parseInt(currentPage) + 1;
    getFilteredPosts(pageNum);
  }); //Prev button clicked

  $('body:not(.search)').on('click', '.posts-pagination a.prev', function (e) {
    e.preventDefault();
    var currentPage = $('span.page-numbers.current').html();
    var pageNum = parseInt(currentPage) - 1;
    getFilteredPosts(pageNum);
  });
});
"use strict";

/**
 * Regions maps JS
 *
 * jVectorMap
 * https://jvectormap.com/
 *
 * @since 1.0.0
 */
jQuery(document).ready(function ($) {
  country_codes.push('DI');

  if (document.querySelector('.cloves-map')) {
    var setHovered = function setHovered(code) {
      var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');
      regions.forEach(function (area) {
        if (area.indexOf(code) > -1) {
          if (area.includes('DI')) {
            $('path[data-code="DI"]').css('fill', '#84C6C2');
          } else {
            $('path[data-code="DI"]').css('fill', '#bad8d3');
          }

          mapObj.setSelectedRegions(area);
          return;
        }
      });
    };

    var setZoomIn = function setZoomIn(code) {
      $('.back-to-world').css('opacity', 1);
      zoomingIn = true;
      var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');
      regions.forEach(function (area) {
        var mapArea = area;

        if (area.indexOf(code) > -1) {
          if (code == 'US' || code == 'CA' || code == 'GL') {
            mapArea = ['CA', 'GL', 'MX'];
          }

          mapObj.clearSelectedRegions();
          mapObj.setFocus({
            regions: mapArea,
            animate: true
          });
          area.forEach(function (country) {
            if (country_codes.includes(country) && country !== 'DI') {
              mapObj.setSelectedRegions(country);
              $('path[data-code="' + country + '"]').css('fill', '#318d88');
            }
          });
          return;
        }
      });
      zoomingIn = false;
    };

    var openCountryModal = function openCountryModal(code) {
      //Close current
      var current = $('.detail.active');
      $(current).fadeToggle();
      $(current).removeClass('active'); //Open new

      var detail = $('.detail[data-country-code="' + code + '"]');
      $(detail).fadeToggle();
      $(detail).addClass('active');
    };

    var closeCountryModal = function closeCountryModal() {
      var detail = $('.detail.active');
      $(detail).fadeToggle();
      $(detail).removeClass('active');
    };

    // Group countries into regions
    var regions = [];
    regions[0] = []; //Africa

    regions[1] = ['BF', 'DJ', 'BI', 'BJ', 'ZA', 'BW', 'DZ', 'ET', 'RW', 'TZ', 'GQ', 'NA', 'NE', 'NG', 'TN', 'LR', 'LS', 'ZW', 'TG', 'TD', 'ER', 'LY', 'GW', 'ZM', 'CI', 'EH', 'CM', 'EG', 'SL', 'CG', 'CF', 'AO', 'CD', 'GA', 'GN', 'GM', 'XS', 'GH', 'SZ', 'MG', 'MA', 'KE', 'SS', 'ML', 'MW', 'SO', 'SN', 'MR', 'UG', 'SD', 'MZ']; //Asia

    regions[2] = ['DI', 'BD', 'MN', 'BN', 'BT', 'HK', 'PS', 'LA', 'TW', 'LK', 'TL', 'TM', 'TJ', 'TH', 'XC', 'NP', 'PK', 'PH', 'CN', 'AF', 'JP', 'AM', 'VN', 'GE', 'IN', 'AZ', 'ID', 'KG', 'UZ', 'MM', 'SG', 'KH', 'KR', 'KP', 'KZ', 'MY']; //Europe

    regions[3] = ['BE', 'FR', 'BG', 'DK', 'HR', 'DE', 'BA', 'HU', //'JE',
    'FI', 'BY', 'GR', 'RU', 'NL', 'PT', 'NO', //'LI',
    'LV', 'LT', 'LU', //'FO',
    'PL', 'XK', 'CH', //'AD',
    'EE', 'IS', 'AL', 'IT', //'GG',
    'CZ', //'IM',
    'GB', //'AX',
    'IE', 'ES', 'ME', 'MD', 'RO', 'RS', 'MK', 'SK', //'MT',
    'SI', //'SM',
    'UA', 'SE', 'AT']; //Latin America & Caribbean

    regions[4] = ['MX', //Mexico
    'PR', //Puerto Rico
    'DO', //Dominican Rep.
    //'DM', //Dominica
    //'LC', //Saint Lucia
    'NI', //Nicaragua
    'PA', //Panama
    'SV', //El Salvador
    'HT', //Haiti
    'TT', //Trinidad and Tobago
    'JM', //Jamaica
    'GT', //Guatemala
    'HN', //Honduras
    'BZ', //Belize
    'BS', //Bahamas
    'CR', //Costa Rica
    'CU', //Cuba
    //South American Countries
    'PY', 'CO', 'VE', 'CL', 'SR', 'BO', 'EC', 'AR', 'GY', 'BR', 'PE', 'UY', 'FK']; //North America

    regions[5] = ['CA', //Canada
    'US', //United States
    'GL' //Greenland
    ]; //Middle East

    regions[6] = ['TR', //Turkey
    'CY', //Cypress
    'LB', //Lebanon
    'SY', //Syria
    'IQ', //Iraq
    'IR', //Iran
    'IL', //Israel
    'JO', //Jordan
    'SA', //Saudi Arabia
    'KW', //Kuwait
    'QA', //Qatar
    //'BH', //Bahrain
    'AE', //United Arab Emirates
    'OM', //Oman
    'YE' //Yemen
    ]; //Oceania

    regions[7] = [//'GU',
    //'PW',
    //'KI',
    'NC', //'NU',
    'NZ', 'AU', 'PG', 'SB', //'PF',
    'FJ', //'FM',
    //'WS',
    'VU', 'TF'];
    var zoomingIn = false;
    $('.detail .close').on('click', function () {
      closeCountryModal();
    });
    var mapConfig = {
      map: 'world_merc',
      backgroundColor: 'transparent',
      zoomButtons: false,
      zoomOnScroll: true,
      regionsSelectable: false,
      regionStyle: {
        initial: {
          fill: '#84C6C2',
          opacity: 0.6
        },
        selected: {
          fill: '#84C6C2',
          opacity: 1
        },
        hover: {
          fill: '#054447',
          opacity: 1
        }
      },
      onRegionTipShow: function onRegionTipShow(e, label, code) {
        if (code == 'DI') e.preventDefault();
        var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');

        if (mapObj.scale < 1.1 || !country_codes.includes(code)) {
          e.preventDefault();
        } else {
          label.css('background-color', '#ffbc38').css('color', '#054447').css('padding', '0.25rem 0.5rem').css('font', '700 1.11rem/1 "GalanoGrotesque",sans-serif').css('border', 'none').css('border-radius', '0');
        }
      },
      onRegionOver: function onRegionOver(e, code) {
        var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');

        if (mapObj.scale < 1.1) {
          //zoomed out
          e.preventDefault();
          if (!zoomingIn) setHovered(code);
        } else {
          if (!country_codes.includes(code)) {
            e.preventDefault();
          }
        }
      },
      onRegionOut: function onRegionOut() {
        var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');

        if (mapObj.scale < 1.1) {
          mapObj.clearSelectedRegions();
        }

        $('path[data-code="DI"]').css('fill', '#bad8d3');
      },
      onRegionClick: function onRegionClick(e, code) {
        $('path[data-code="DI"]').css('fill', '#bad8d3');
        var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');

        if (mapObj.scale < 1.1) {
          setZoomIn(code);
        } else {
          if (country_codes.includes(code)) {
            openCountryModal(code);
          }
        }
      }
    };
    $('.cloves-map').vectorMap(mapConfig);

    (function () {
      // Collect the rest of the World
      var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');
      var states = regions.join(',');

      for (var code in mapObj.regions) {
        if (mapObj.regions.hasOwnProperty(code)) {
          if (states.indexOf(code) == -1) {
            regions[0].push(code);
          }
        }
      }
    })(); //Reset map


    $('.back-to-world').on('click', function () {
      $('path[data-code="DI"]').css('fill', '#bad8d3');
      var mapObj = $('.cloves-map').vectorMap('get', 'mapObject');
      mapObj.clearSelectedRegions();
      mapObj.reset();
      $('.cloves-map path').css('fill', '#84C6C2');
      $('.back-to-world').css('opacity', 0);
    }); //Handle basil dropdown selection

    $('.region-select-group li.region').on('click', function () {
      var value = $(this).data('region-slug');
      var code;

      if (value == 'africa') {
        code = 'BF';
      } else if (value == 'asia') {
        code = 'BD';
      } else if (value == 'europe') {
        code = 'BE';
      } else if (value == 'latin-america') {
        code = 'PR';
      } else if (value == 'middle-east') {
        code = 'CY';
      } else if (value == 'north-america') {
        code = 'US';
      } else if (value == 'oceania') {
        code = 'NC';
      }

      setZoomIn(code);
    });
  }
});
"use strict";

/**
 * Custom JavaScript
 *
 * @since 1.0.0
 */
document.addEventListener('DOMContentLoaded', function () {
  /**
   *
   * Mobile Menu
   *
   **/
  var menuBtn = document.querySelector('.menu-toggle');
  var menu = document.querySelector('.header-nav');
  menuBtn.addEventListener('click', function () {
    menuBtn.classList.toggle('is-open');
    menu.classList.toggle('is-open'); //Close previously opened sub navs

    jQuery('.sub-menu-wrapper.opened').slideToggle().removeClass('opened');
    jQuery('.menu-item-has-children.active').removeClass('active');
  });
  /**
   *
   * Top menu sub-menus
   *
   */

  var topMenuItems = document.querySelectorAll('ul.top-navigation li.menu-item-has-children');
  topMenuItems.forEach(function (item) {
    item.addEventListener('click', function (event) {
      event.preventDefault();
      var subMenu = item.querySelector('ul.sub-menu');
      jQuery(subMenu).toggleClass('is-open');
      jQuery(subMenu).slideToggle();
    });
  });
  /**
   *
   * Trigger/Open Modals
   *
   **/

  var modalTriggers = document.querySelectorAll('.modal-trigger');
  modalTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function (event) {
      event.preventDefault();
      toggleModal(trigger);
    });
  });
  /**
   *
   * Close Modals
   *
   **/

  var modalClosers = document.querySelectorAll('.modal .close svg, .site-overlay');
  modalClosers.forEach(function (closeBtn) {
    closeBtn.addEventListener('click', function (event) {
      toggleModal();
    });
  });
  /**
   *
   * Tabs
   *
   **/

  var tabs = document.querySelectorAll('.tabs');
  tabs.forEach(function (tabs) {
    var tabTimeline = gsap.timeline({
      defaults: {
        duration: 0.15
      }
    });
    var triggers = tabs.querySelectorAll('.tab-titles>*');
    triggers.forEach(function (trigger) {
      trigger.addEventListener('click', function (e) {
        var currentTitle = tabs.querySelector('.tab-titles>.active');
        var currentTab = tabs.querySelector('.tab-contents>.active');
        var tabSelector = trigger.dataset.tabContent;
        var tabContent = tabs.querySelector('.' + tabSelector); //Set titles

        currentTitle.classList.remove('active');
        trigger.classList.add('active'); //Set contents

        currentTab.classList.remove('active');
        tabContent.classList.add('active'); //Animate

        tabTimeline.fromTo(currentTab, {
          opacity: 1,
          scale: 1
        }, {
          opacity: 0,
          scale: 0.5
        });
        tabTimeline.to(currentTab, {
          display: 'none'
        });
        tabTimeline.to(tabContent, {
          opacity: 0,
          display: 'grid'
        });
        tabTimeline.fromTo(tabContent, {
          opacity: 0,
          scale: 0.5
        }, {
          opacity: 1,
          scale: 1
        });
      });
    });
  });
  /**
   *
   * Cinnamon Regions Accordion
   *
   **/

  var regionsAccTriggers = document.querySelectorAll('.region-acc');
  var regionList = document.querySelectorAll('.cinnamon-list');
  var countryClose = document.querySelectorAll('.cinnamon-detail .close');
  regionsAccTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      var regionSlug = trigger.dataset.region;
      var detail = document.querySelector('.detail-' + regionSlug);
      jQuery(regionList).toggle();
      jQuery(detail).fadeToggle();
    });
  });
  countryClose.forEach(function (close) {
    close.addEventListener('click', function () {
      jQuery(close.closest('.cinnamon-detail')).toggle();
      jQuery(regionList).toggle();
    });
  });
  /**
   *
   * Trigger/Open Photo Captions
   *
   **/

  var captionToggles = document.querySelectorAll('.photo-caption-text + .info-icon');
  captionToggles.forEach(function (toggle) {
    toggle.addEventListener('click', function () {
      var caption = toggle.previousElementSibling;
      jQuery(caption).fadeToggle();
    });
  });
  /**
   *
   * Trigger/Open Info Box - Ex. Cloves Section
   *
   **/

  var infoToggles = document.querySelectorAll('.info-box svg');
  infoToggles.forEach(function (i) {
    i.addEventListener('click', function () {
      jQuery(i.nextElementSibling).toggleClass('is-open');
    });
  });
  /**
   *
   *
   * Photo essay anchor links
   *
   */

  var photoEssaySections = document.querySelector('.photo-essay');

  if (photoEssaySections) {
    var activateAnchorAndUpdateBackground = function activateAnchorAndUpdateBackground() {
      var wrapperBottom = anchorsWrapper.getBoundingClientRect().bottom;
      var mostRelevantSection = null; // Check all sections, not just those with anchors

      sections.forEach(function (section) {
        var sectionTop = section.getBoundingClientRect().top; // Update most relevant section if it's the last one before or at the wrapper's bottom

        if (sectionTop <= wrapperBottom && (!mostRelevantSection || sectionTop > mostRelevantSection.getBoundingClientRect().top)) {
          mostRelevantSection = section;
        }
      });

      if (mostRelevantSection) {
        // Update active class based on the most relevant section
        anchorItems.forEach(function (anchor) {
          var href = anchor.getAttribute('href');
          var linkedSection = href ? document.querySelector(href) : null;

          if (linkedSection === mostRelevantSection) {
            anchor.parentNode.classList.add('active');
          } else {
            anchor.parentNode.classList.remove('active');
          }
        });
        updateWrapperBackground(mostRelevantSection);
      }
    };

    var updateWrapperBackground = function updateWrapperBackground(section) {
      // Ensure only the relevant background class is applied
      anchorsWrapper.classList.remove('bg-eggshell', 'bg-eggshell2');

      if (section.classList.contains('bg-eggshell')) {
        anchorsWrapper.classList.add('bg-eggshell');
      } else if (section.classList.contains('bg-eggshell2')) {
        anchorsWrapper.classList.add('bg-eggshell2');
      }
    };

    var sections = document.querySelectorAll('.photo-essay');
    var anchorItems = document.querySelectorAll('.anchor-item a');
    var anchorsWrapper = document.querySelector('.anchors-wrapper');
    window.addEventListener('scroll', activateAnchorAndUpdateBackground);
  }
  /**
   *
   * Init AOS
   *
   */


  AOS.init({
    duration: 500,
    easing: 'ease-out-sine',
    once: true
  });
}); //End DOMContentLoaded

/**
 *
 * Func: Toggle Modal
 *
 **/

function toggleModal(trigger) {
  var overlay = document.querySelector('.site-overlay');

  if (trigger) {
    var modalClass = '.' + trigger.dataset.modalcontrol;
    var modal = document.querySelector(modalClass); //Add active class to modal and site overlay

    overlay.classList.toggle('active');
    modal.classList.toggle('active');
  } else {
    var _modal = document.querySelector('.modal.active'); //Close modal


    overlay.classList.toggle('active');

    _modal.classList.toggle('active');
  }
}
/**
 *
 * jQuery
 *
 **/


jQuery(document).ready(function ($) {
  /**
   *
   * Handle anchor links
   *
   */
  var hash = window.location.hash;

  if (hash) {
    var target = $(hash);

    if (target.length) {
      $(window).on('load', function () {
        $('html, body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
      });
    }
  }
  /**
   *
   * Drop down navs
   *
   **/


  var menuParents = $('.menu-item-has-children');
  menuParents.each(function (i) {
    $(this).click(function () {
      toggleSubMenus($(this), false);
    });
  });

  function toggleSubMenus(item, subNav) {
    //Close previously opened sub navs first
    $('.sub-menu-wrapper.opened').not($(item).children('.sub-menu-wrapper')).not($(item).closest('.sub-menu-wrapper')).slideToggle().removeClass('opened'); //Remove active class on previous item

    $('.menu-item-has-children.active').not($(item)).not($(item).parents('.menu-item-has-children.active')).removeClass('active'); //Open new sub nav

    $(item).toggleClass('active');
    $(item).children('.sub-menu-wrapper').toggleClass('opened').slideToggle();
  } // Stop event propagation on sub menus


  $('.sub-menu').click(function (e) {
    e.stopPropagation();
  });
  /**
   *
   * Search bar toggle
   *
   **/

  var searchBarToggle = $('.top-header .spy, .search-bar .plus');
  var searchBar = $('.search-bar');
  searchBarToggle.click(function () {
    searchBar.slideToggle();
  });
  /**
   *
   * Site-wide Notice toggle
   *
   **/

  $('.sitewide-notice svg').click(function (e) {
    e.preventDefault();
    $(this).toggle();
    $('.sitewide-notice').slideToggle();
    sessionStorage.setItem('gfn_alert_hidden', 'hidden');
  });

  if (sessionStorage.getItem('gfn_alert_hidden') != 'hidden') {
    $('.sitewide-notice').removeClass('hidden');
  }
  /**
   *
   * Template 3 accordions/info boxes
   *
   */


  var globeAcc = $('.globe-acc');
  var globeAccTitle = $('.globe-acc .acc-title');
  var globeAccContent = $('.globe-acc .acc-content');
  $(globeAccTitle).on('click', function () {
    $(globeAcc).toggleClass('active');
  });
  var foodBankAcc = $('.what-is-a-food-bank');
  var foodBankAccContent = $('.what-is-a-food-bank .content');
  $(foodBankAcc).on('click', function () {
    $(foodBankAcc).toggleClass('active');
    $(foodBankAccContent).fadeToggle();
  });
  /**
   *
   * Matcha anchor links
   *
   **/

  var anchorElements = $('.matcha h2, .anchor-heading h2');
  var sidebar = $('aside.anchor-sidebar ul');

  if (sidebar && anchorElements) {
    //Hide sidebar if no anchors found
    if (sidebar && anchorElements.length == 0) {
      $('aside.anchor-sidebar').css('display', 'none');
    }

    var anchorLinks = '';
    anchorElements.each(function (i) {
      var anchorString = $(this).html();
      var anchorSlug = anchorString.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
      $(this).attr('id', anchorSlug);
      anchorLinks += '<li><a href="#' + anchorSlug + '">' + anchorString + '</a></li>';
    });
    sidebar.html(anchorLinks);
  }
  /**
   *
   * Sidebar mobile toggle
   *
   **/


  if ($(window).width() <= 768) {
    $('.anchor-sidebar').on('click', function () {
      $(this).toggleClass('opened');
      $(this).find('ul').slideToggle();
    });
  }
  /**
   *
   * Poppy grid item toggle
   *
   **/


  var poppyParent = $('.poppy-values');
  var poppyItems = $('.poppy-values .value');
  var poppyTimeline = gsap.timeline({
    defaults: {
      duration: 0.3
    }
  });
  poppyItems.each(function (i) {
    $(this).click(function () {
      document.querySelector('.poppy-values').scrollIntoView();
      var modalClass = $(this).data('modalId');
      var modal = $('.' + modalClass);
      $(modal).addClass('opened');
      poppyTimeline.to(poppyItems, {
        opacity: 0,
        display: 'none'
      });
      poppyTimeline.fromTo(modal, {
        scale: 0,
        display: 'none',
        opacity: 0
      }, {
        scale: 1,
        display: 'block',
        opacity: 1
      });
    });
  });
  $(poppyParent).on('click', '.close', function () {
    var modal = $('.value-detail.opened');
    poppyTimeline.to(modal, {
      scale: 0,
      display: 'none',
      opacity: 0
    });
    poppyTimeline.to(poppyItems, {
      opacity: 1,
      display: 'flex'
    });
    $(modal).removeClass('opened');
  });
  /**
   *
   * Sumac item toggle
   *
   **/

  var sumacItems = $('.sumac .item-heading');
  sumacItems.each(function (i) {
    $(this).click(function () {
      $(this).closest('.item-content').toggleClass('is-open');
      $(this).next().slideToggle();
    });
  });
  /**
   *
   * jVectorMap
   * https://jvectormap.com/
   *
   */

  if (document.querySelector('.thyme-map')) {
    $('.thyme-map').vectorMap({
      map: 'world_merc',
      backgroundColor: 'transparent',
      zoomOnScroll: false,
      zoomButtons: false,
      regionStyle: {
        initial: {
          fill: '#D24740'
        },
        hover: false
      },
      regionLabelStyle: {
        hover: {
          cursor: 'crosshair'
        }
      },
      onRegionTipShow: function onRegionTipShow(e, label, code) {
        e.preventDefault();
      }
    }); //Thyme World Map animations

    var thymeMap = gsap.timeline({
      scrollTrigger: {
        trigger: '.thyme-map',
        start: 'center bottom-=100px',
        end: 'center top'
      },
      defaults: {
        duration: 15,
        ease: 'expo',
        fill: '#F5AC1E',
        opacity: 1
      }
    });
    country_codes.forEach(function (c) {
      var country = $('.thyme-map path[data-code="' + c + '"]');
      $(country).addClass('in-network');
    });
    var outOfNetworkCountries = $('.jvectormap-container path:not(.in-network), path[data-code="DI"]');
    thymeMap.to(outOfNetworkCountries, {});
    /*
    outOfNetworkCountries.each(function (c) {
    	thymeMap.to(this, {}, '<+0.1');
    });
    */
  }
  /**
   *
   * Init plyr.js
   * https://github.com/sampotts/plyr
   **/


  var plyrs = document.querySelectorAll('.plyr');
  var players = Array.from(plyrs).map(function (p) {
    return new Plyr(p, {
      iconPrefix: 'gfn',
      iconUrl: ''
    });
  });
  /**
   *
   * Init glide.js
   * https://github.com/glidejs/glide
   **/

  var changeActiveBullet = function changeActiveBullet(newIndex, containerElement) {
    var activeBullet = 'glide__bullet--active';
    var glideDir = containerElement.querySelector("[data-glide-dir=\"=".concat(newIndex, "\"]"));
    containerElement.querySelector(".".concat(activeBullet)).classList.remove(activeBullet);
    if (glideDir) glideDir.classList.add(activeBullet);
  };

  var glideCarousels = document.querySelectorAll('.glide:not(.countries-carousel)');
  glideCarousels.forEach(function (item, index) {
    var glideItem = new Glide(item);
    var bulletsContainerElement = item.querySelector('.glide__bullets');
    glideItem.mount();
    glideItem.on('run', function () {
      requestAnimationFrame(function () {
        return changeActiveBullet(glideItem.index, bulletsContainerElement);
      });
    }); //Check if carousel has video-gallery-glide class

    if (item.classList.contains('video-gallery-glide')) {
      var _videoTitles = document.querySelectorAll('button.video-title');

      _videoTitles.forEach(function (title, i) {
        title.addEventListener('click', function () {
          var slide = title.dataset.slide;
          glideItem.go("=".concat(slide));

          _videoTitles.forEach(function (t, i) {
            t.classList.remove('active');
          });

          title.classList.add('active');
        });
      }); //Update button titles on slide change


      glideItem.on('run', function () {
        var activeIndex = glideItem.index;

        _videoTitles.forEach(function (t, i) {
          t.classList.remove('active');
        });

        _videoTitles[activeIndex].classList.add('active');
      });
    }
  }); //Carousel used on single country pages

  var countryCarousel = document.querySelector('.glide.countries-carousel');

  if (countryCarousel) {
    var bulletsContainerElement = countryCarousel.querySelector('.glide__bullets');
    var glideItem = new Glide(countryCarousel, {
      perView: 3,
      gap: 24,
      bound: true,
      breakpoints: {
        768: {
          perView: 1
        },
        992: {
          perView: 2
        }
      }
    });
    glideItem.mount();
    glideItem.on('run', function () {
      requestAnimationFrame(function () {
        var n = glideItem.index + 2;
        changeActiveBullet(n, bulletsContainerElement);
      });
    });
  }
  /**
   * Community animations
   */


  if (document.querySelector('body.page-template-community')) {
    var animationScenes = function animationScenes() {
      if ($(window).width() > 767) {
        // first scene
        if ($(document).scrollTop() > $('.scene-1').offset().top - $(window).height() * 0.7 && !body.hasClass('start-first-anim')) {
          body.addClass('start-first-anim');
        } // second scene


        if ($(document).scrollTop() > $('.scene-2').offset().top - $(window).height() * 0.7 && !body.hasClass('start-second-anim')) {
          body.addClass('start-second-anim');
        }
      } else {
        if ($(document).scrollTop() > $('.scene-mobile-1').offset().top - $(window).height() * 0.7 && !body.hasClass('start-first-mob-anim')) {
          body.addClass('start-first-mob-anim');
        }

        if ($(document).scrollTop() > $('.scene-mobile-3').offset().top - $(window).height() * 0.7 && !body.hasClass('start-second-mob-anim')) {
          body.addClass('start-second-mob-anim');
        }
      } // globe animation


      if ($(document).scrollTop() > globe.offset().top - $(window).height() * 0.7 && !body.hasClass('start-globe-anim')) {
        body.addClass('start-globe-anim');
      }
    };

    // Community Boxes Animations
    var communityAnimations = function communityAnimations() {
      var section = $('.hero-section, .animation-section, .boxes-section, .globe-section');
      section.each(function () {
        var $this = $(this);

        if ($(window).scrollTop() > $this.offset().top - $(window).height() * 0.8) {
          $this.addClass('start-intro-animations');
        }
      });
    };

    var body = $('body'),
        globe = $('.globe-wrap');
    $(window).bind('scroll load', function () {
      animationScenes();
    }); // Communities Items Toggle

    var popupToggle = $('.popup-toggle'),
        itemToggle = $('.item-toggle'),
        tooltip = $('.tooltip-button');
    popupToggle.on('click', function (e) {
      e.preventDefault();
      $('.box-item.open').removeClass('open');
      var $this = $(this);

      if ($(this).parent().hasClass('open')) {
        popupToggle.parent().removeClass('open');
      } else {
        popupToggle.parent().removeClass('open');
        $this.parent().addClass('open');
      }
    });
    itemToggle.on('click', function (e) {
      e.preventDefault();
      $('.box-wrap.open').removeClass('open');
      var $this = $(this);

      if ($(this).parent().hasClass('open')) {
        itemToggle.parent().removeClass('open');
      } else {
        itemToggle.parent().removeClass('open');
        $this.parent().addClass('open');
      }
    });
    tooltip.on('click', function () {
      $(this).parent().toggleClass('open');
    });
    $(window).on('scroll load', communityAnimations);
  }
  /**
   *
   * Photo Essay & Video Titles anchor mobile toggle
   *
   */


  var anchorToggle = $('ul.essay-anchors .mobile-toggle');
  var anchors = $('ul.essay-anchors li');
  var anchorsParent = $('ul.essay-anchors');
  $(anchorToggle).on('click', function () {
    anchorsParent.addClass('isMobile');

    if ($(this).hasClass('closed')) {
      $(anchors).css('display', 'inline-block');
      $(this).removeClass('closed');
      $(this).addClass('active');
      return;
    }

    if ($(this).hasClass('active')) {
      $(anchors).not('.active').hide();
      $(this).removeClass('active');
      $(this).addClass('closed');
      return;
    }
  });
  $('ul.essay-anchors a').on('click', function () {
    if ($('ul.essay-anchors').hasClass('isMobile')) {
      //timeout
      setTimeout(function () {
        $(anchors).not('.active').hide();
        $(anchorToggle).removeClass('active');
        $(anchorToggle).addClass('closed');
      }, 500);
    }
  });
  var videoTitlesToggle = $('button.titles-mobile-toggle');
  var videoTitles = $('button.video-title');
  $(videoTitlesToggle).on('click', function () {
    if ($(this).hasClass('closed')) {
      $(videoTitles).css('display', 'inline-block');
      $(this).removeClass('closed');
      $(this).addClass('opened');
      return;
    }

    if ($(this).hasClass('opened')) {
      $(videoTitles).not('.active').hide();
      $(this).removeClass('opened');
      $(this).addClass('closed');
      return;
    }
  });
}); //End jQuery
"use strict";

jQuery(document).ready(function ($) {
  //Set init item count
  var intiVisibleItems = $('.marjoram .item:visible');
  var visibleCount = $(intiVisibleItems).length; //Update years on page load

  updateYears(); //Handle prev/next arrow clicks

  var nextCtrl = $('.marjoram .next');
  var prevCtrl = $('.marjoram .prev');
  $(nextCtrl).on('click', function () {
    if ($(this).hasClass('disabled')) return;
    nextTimeline();
  });
  $(prevCtrl).on('click', function () {
    if ($(this).hasClass('disabled')) return;
    prevTimeline();
  });

  function nextTimeline() {
    //const visibleItems = $('.marjoram .item.is-visible');
    var visibleItems = $('.marjoram .item:visible');
    var lastItem = $('.marjoram .item').last();
    var lastVisibleItem = $(visibleItems).last();
    var nextItems = $(lastVisibleItem).nextAll(':lt(' + visibleCount + ')');
    visibleItems.each(function () {
      animateOutItem(this);
    });
    nextItems.each(function () {
      animateInItem(this);
    }); //Handle controls

    if ($(nextItems).last()[0] == $(lastItem)[0]) {
      $(nextCtrl).addClass('disabled');
    }

    $(prevCtrl).removeClass('disabled');
  }

  function prevTimeline() {
    //const visibleItems = $('.marjoram .item.is-visible');
    var visibleItems = $('.marjoram .item:visible');
    var firstItem = $('.marjoram .item').first();
    var firstVisibleItem = $(visibleItems).first();
    var prevItems = $(firstVisibleItem).prevAll(':lt(' + visibleCount + ')');
    visibleItems.each(function () {
      animateOutItem(this);
    });
    prevItems.each(function () {
      animateInItem(this);
    }); //Handle controls

    if ($(prevItems).last()[0] == $(firstItem)[0]) {
      $(prevCtrl).addClass('disabled');
    }

    $(nextCtrl).removeClass('disabled');
  }

  function animateOutItem(item) {
    var img = $(item).find('.item-image');
    var years = $(item).find('.years');
    var text = $(item).find('.item-lower');
    var offset = '<+0.1';
    var outTimeline = gsap.timeline({
      defaults: {
        duration: 0.5,
        ease: 'expo',
        scale: 0,
        opacity: 0
      }
    });
    outTimeline.to(img, {}, offset).to(years, {}, offset).to(text, {}, offset);
    $(item).removeClass('is-visible').css('display', 'none');
    updateYears();
  }

  function animateInItem(item) {
    var img = $(item).find('.item-image');
    var years = $(item).find('.years');
    var text = $(item).find('.item-lower');
    var offset = '<+0.1';
    var inTimeline = gsap.timeline({
      delay: 0.5,
      defaults: {
        duration: 0.5,
        ease: 'expo'
      }
    });
    inTimeline.fromTo($(img), {
      scale: 0,
      opacity: 0
    }, {
      scale: 1,
      opacity: 1
    }, offset).fromTo($(years), {
      scale: 0,
      opacity: 0
    }, {
      scale: 1,
      opacity: 1
    }, offset).fromTo($(text), {
      scale: 0,
      opacity: 0
    }, {
      scale: 1,
      opacity: 1
    }, offset);
    $(item).addClass('is-visible').css('display', 'block');
    updateYears();
  }

  function updateYears() {
    var yearsEl = $('.year-range');
    var firstYear = $('.item:visible').first().find('.year-start').html();
    var lastYear = $('.item:visible').last().find('.year-end').html();
    if (!lastYear) lastYear = $('.item:visible').last().find('.year-start').html();
    $(yearsEl).fadeOut(400, function () {
      var string = firstYear + '-' + lastYear;

      if (firstYear == lastYear) {
        string = firstYear;
      }

      $(this).html(string).fadeIn();
    });
  }
});