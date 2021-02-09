$( document ).ready(function() {

        // Open menu
        $('#gde-menu-btn').click(function(){
            $('#gde-menu-background').animate({
              opacity: '0.4'
              }, 700); 
      
      
              document.getElementById('gde-mobile-menu-outer-wrapper').style.display = "flex";
      
              $('#gde-mobile-menu').animate({
                  right: '0'
                 }, 700); 
              
      
            });

        // Close menu
        $('#gde-menu-close').click(function(){

            $('#gde-menu-background').animate({
              opacity: '0'
              }, 300); 
      
              function slideTimeout() {
                setTimeout(function(){ 
                  document.getElementById('gde-mobile-menu-outer-wrapper').style.display = "none";
                }, 3000);
              }
      
              $('#gde-mobile-menu').animate({
                  right: '-100%'
                 }, 700); 
      
                 slideTimeout();
            });

    /* Show a +/- (drop down button) button to indicate sub menus */
    if($('.gde-target-mobile-navigation-list #menu-malgruppsmeny li').hasClass('menu-item-has-children')){
        $("<div class='drop-down-btn'></div>").insertAfter(".gde-target-mobile-navigation-list #menu-malgruppsmeny .menu-item-has-children > a"); 
    };
    /* Show a right caret icon for and if the menu has children, otherwise don't show it. */
    if($('#menu-malgruppsmeny-1 li .mobile-sub-menu li').hasClass('menu-item-has-children')){
      $("<i class='fas fa-caret-right'></i>").insertAfter("#menu-malgruppsmeny-1 li .mobile-sub-menu .menu-item-has-children > a"); 
  };

  /* The loop for iterating all the classes and check if the drop-down button is present. In that expand or collapse the menu depending on the current state.
      This peice of work is stolen directly from W3Schools - I'll commit. :) */

    var drp = document.getElementsByClassName("drop-down-btn");
    var i;

    for (i = 0; i < drp.length; i++) {
        drp[i].addEventListener("click", function() {
          this.classList.toggle("active");
      
          var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            $(panel).slideUp();
          } else {
            $(panel).slideDown();
          }
        });
      }

            //Back to top-badge
            topBtn = document.getElementById("gde-back-top");

            window.onscroll = function() {scrollFunction()};
      
            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                topBtn.style.display = "flex";
              } else if (document.body.scrollTop === 0 || document.documentElement.scrollTop === 0) {
                topBtn.style.display = "none";
              }
      
              // Check when the button is at the bottom of the page
              if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 260) {
                  $('#gde-back-top p').css('color', 'white');
                } else {
                  $('#gde-back-top p').css('color', '#333333'); 
                }
            }
      
            topBtn.addEventListener("click", function() {
              $("html, body").animate({scrollTop:0}, 700, 'swing');
            });

});