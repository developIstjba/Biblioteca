/* 
 * Sisevi
 * Version 1.1
 * Created by @jonthcevallos
 */


$(document).ready(function(){
    
    var pathname = window.location.pathname;
    var dir = pathname.split('/');

    // nav-link
    $('.nav-toogle').click(function(e){
	e.preventDefault();
        
      	if ($(this).parent('li.nav-group').children('ul.nav-section').hasClass('visible')) {
            $(this).parent('li.nav-group').children('ul.nav-section').removeClass('visible');
            $(this).children('i[data-rol=nav-icon-toogle]').removeClass('icon-keyboard_arrow_down');
            $(this).children('i[data-rol=nav-icon-toogle]').addClass('icon-keyboard_arrow_right');  
	}else{
            $('.nav-section').removeClass('visible');
            $(this).parent('li.nav-group').children('ul.nav-section').addClass('visible');
            $(this).children('i[data-rol=nav-icon-toogle]').removeClass('icon-keyboard_arrow_right');
            $(this).children('i[data-rol=nav-icon-toogle]').addClass('icon-keyboard_arrow_down');  
	}
                
    });


    // dropdown
    $('.dropdown-toggle').click(function(e){
	e.preventDefault();
        
	if ($(this).parent().children('ul').hasClass('visible')) {
            $(this).parent().children('ul').removeClass('visible');
	}else{
            $(this).parent().children('ul').addClass('visible');
	}
        
    });
    
    
    // dropdown close
    $(document).on('mouseup', function(){
        
	var element = $(document.activeElement);
        var btn = element.hasClass('dropdown-toggle');
        
        if(btn === false){
            $('.dropdown-toggle').parent().children('ul').removeClass('visible');
        }
        
    });

    // Modal 
//    document.addEventListener('click', e => {
//        if (e.target == document.querySelector('.modal')) {
//          document.querySelector(".modal").classList.remove();
//        }
//    });    

    
    // modal toogle
//    $('.btn-modal-toogle').click(function(e){
//	e.preventDefault();
//        let id = $(this).attr('data-modal');
//        let state = $('#'+id).attr('data-toogle');
//      	if (state == 'hidden') {
//            $('#'+id).attr('data-toogle', 'show');
//            
//	}else{
//            $('#'+id).attr('data-toogle', 'hidden');
//	}
//                
//    });
















});