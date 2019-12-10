$(document).ready(function(){
    /*$(document).on('click','.add_btn', function(){
        
        $(this).addClass('hide')
        $(this).parents('.col-md-3').find('.remove_btn').removeClass('hide')
        var clone= $(this).parents('.modal_tab').find('.tag_name').clone().removeClass('tag_name hide')
        // $(this).addClass('hide');
        // $(this).parents('.modal_tab').find('.remove_btn').removeClass('hide')
        // $(clone).find()
        $('.modal_tab').find('.clone_append').append($(clone))
    })
    $(document).on('click','.remove_btn', function(){
        $(this).parents('.row').remove();
    });*/
    var dropdown = document.getElementsByClassName("dropdown-btn");
 
            
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
         
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";

      } else {
      dropdownContent.style.display = "block";
      
      }
      });
    }
})

