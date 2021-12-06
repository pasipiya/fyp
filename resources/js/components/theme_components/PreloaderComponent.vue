<template>

    <!--Preloader-->
    <div class="preloader"></div>
    <!--End Preloader-->

</template>
<script>

export default {
    methods:{
          preloader() {
      $(document).ready(function () {
        $(".preloader").fadeOut(1000, function () {
          $(".loader").remove();
        });
      });
    },
    },
    created(){
        this.preloader();
    }
}
</script>
