<div class="header-bg">
   <div class="inside-header">
      <div class="container">
         <header>
            <h2 class="centered-title" id="quote"></h2>
            <h4 style="text-align: center; color: #777;" id="author"></h4>
         </header>
      </div>
   </div>
</div>
<?php 
if(isset($_SESSION['eldis_cms_text_slideshow'])) {
   $result = getTextSlideshow($_SESSION['eldis_cms_text_slideshow']);
   
}
?>
<script>
(function() {
   let arr = <?php echo json_encode($result); ?>;
   const len = arr.length;
   for (let i = 0, p = Promise.resolve(); i < len; i++) {
      p = p.then(
         () =>
         new Promise(resolve => {
            change(arr[i]).then(() => {
               resolve()
            });
            
         })
      )
   }
   function change(slide) {
      return new Promise(resolve => {
         document.getElementById("author").innerHTML = slide.subheader;
         document.getElementById("quote").innerHTML = slide.header;
         setTimeout(() => {
            resolve(true)
         }, 2000)
      })
   }

})()
</script>