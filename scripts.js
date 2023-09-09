/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function responsive_navbar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }

/* Script for Sticky Navbar
* Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position 
*/
function sticky_navbar() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }


/* TODO - AJAX image dynamic upload */
// $(document).ready(function() {
//   var fileInput = document.querySelector('#file-input');
//   fileInput.addEventListener('change', function() {
//     let formData = new FormData();
//     formData.append('file1', this.files[0]);
//     let xhr = new XMLHttpRequest();
//     xhr.open('POST', '../../util/upload.php');
//     xhr.onload = function() {
//       if (xhr.status === 200) {
//         let response = JSON.parse(xhr.responseText);
//         console.log(response);
//         if (response.status === 'success') {
//           document.querySelector('#image_src').src = response.url;
//         } else {
//           console.error(response.message);
//         }
//       } else {
//         console.error(xhr.statusText);
//       }
//     };
//     xhr.send(formData);
//   });
// });