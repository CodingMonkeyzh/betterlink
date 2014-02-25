// 首页图片轮播
function contentGallery(){
	$("#imageContainer").slidesjs({
		width:975,
		height:308,
		navigation: {
      	active: true,
        // [boolean] Generates next and previous buttons.
        // You can set to false and use your own buttons.
        // User defined buttons must have the following:
        // previous button: class="slidesjs-previous slidesjs-navigation"
        // next button: class="slidesjs-next slidesjs-navigation"
     	 effect: "fade"
        // [string] Can be either "slide" or "fade".
   		},
   		play:{
   			interval: 5000,
   			effect: "fade",
   			auto: true,
   			pauseOnHover: true,
   			restartDelay: 2500
   		}
	});
}

$(document).ready(function(){
	contentGallery();
});