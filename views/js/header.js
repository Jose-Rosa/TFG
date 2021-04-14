/* H E A D E R */

$('#buttonCategories').click(function(){

    if(window.matchMedia('(max-width:767px)').matches){

        $('#buttonCategories').after($('#categories').slideToggle('fast'))

    }else{

        $('#header').after($('#categories').slideToggle('fast'))


    }

})