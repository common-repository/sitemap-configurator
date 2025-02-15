function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function ($) {
  // Enable strict mode.
  'use strict'; // Define global SUI object if it doesn't exist.

  if ('object' !== _typeof(window.SUI)) {
    window.SUI = {};
  }

  SUI.linkDropdown = function () {
    function closeAllDropdowns($except) {
      var $dropdowns = $('.sui-2-10-6 .sui-dropdown');

      if ($except) {
        $dropdowns = $dropdowns.not($except);
      }

      $dropdowns.removeClass('open');
    }

    $('body').on('click', '.sui-dropdown-anchor', function (e) {
      var $button = $(this),
          $parent = $button.parent();
      closeAllDropdowns($parent);

      if ($parent.hasClass('sui-dropdown')) {
        $parent.toggleClass('open');
      }

      e.preventDefault();
    });
    $('body').on('mouseup', function (e) {
      var $anchor = $('.sui-2-10-6 .sui-dropdown-anchor');

      if (!$anchor.is(e.target) && 0 === $anchor.has(e.target).length) {
        closeAllDropdowns();
      }
    });
  };

  SUI.linkDropdown();
})(jQuery);