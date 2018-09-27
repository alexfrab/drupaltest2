/**
 * @file
 * Javascript for Field Codice Fiscale.
 */

/**
 * Provides a farbtastic colorpicker for the fancier widget.
 */
(function ($) {

  'use strict';

  Drupal.behaviors.field_codfisc_colorpicker = {
    attach: function () {
      $('.edit-field-codfisc-colorpicker').on('focus', function (event) {
        var edit_field = this;
        //var picker = $(this).closest('div').parent().find('.field-example-colorpicker');
        var picker = $(this).parentsUntil('#edit-field-event-color').find(".field-codfisc-colorpicker");
        // Hide all color pickers except this one.
        $('.field-codfisc-colorpicker').hide();
        $(picker).show();
        $.farbtastic(picker, function (color) {
          edit_field.value = color;
        }).setColor(edit_field.value);
      });
    }
  };
})(jQuery);
