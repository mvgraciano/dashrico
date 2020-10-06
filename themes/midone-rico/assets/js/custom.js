$('.phone-mask').each(function(i, el){
    $('#'+el.id).mask("(00) 00000-0000");
 })

 function updateMask(event) {
     var $element = $('#'+this.id);
     $(this).off('blur');
     $element.unmask();
     if(this.value.replace(/\D/g, '').length > 10) {
         $element.mask("(00) 00000-0000");
     } else {
         $element.mask("(00) 0000-00009");
     }
     $(this).on('change', updateMask);
 }

 $('.phone-mask').on('change', updateMask);