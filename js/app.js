console.log('hello')
const profile_btn = document.querySelector('.profilebtn')
const edit_btn= document.querySelector('.editbtn')
const profile_content = document.querySelector('#profile')
const update_content= document.querySelector('#edit')
const class_content= document.querySelector('#class')
const class_btn= document.querySelector('.classbtn')



edit_btn.addEventListener('click',()=>{
update_content.classList.remove('hide')
profile_content.classList.add('hide')
profile_btn.classList.remove('active')
class_content.classList.add('hide')
class_btn.classList.remove('active')
edit_btn.classList.add('active')
}
)

profile_btn.addEventListener('click',()=>{
update_content.classList.add('hide')
profile_content.classList.remove('hide')
profile_btn.classList.add('active')
edit_btn.classList.remove('active')
class_content.classList.add('hide')
class_btn.classList.remove('active')
})



class_btn.addEventListener('click',()=>{


    class_content.classList.remove('hide')
    class_btn.classList.add('active')
update_content.classList.add('hide')
profile_content.classList.add('hide')
edit_btn.classList.remove('active')
profile_btn.classList.remove('active')




})

$(document).ready(function() {
    $('#dtHorizontalExample').DataTable( {
        "scrollY": 200,
        "scrollX": true
    } );
} );

$(document).ready(function() {
    $('#media').carousel({
        loop: true,
        pause: true,
        interval: false,
        margin: 0,
        items: 3,
        smartSpeed: 1200,
    });
  });

