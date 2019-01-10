<!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="<?= base_url('public/mdb_hack/js/jquery-3.3.1.min.js');?>"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?= base_url('public/mdb_hack/js/popper.min.js');?>"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?= base_url('public/mdb_hack/js/bootstrap.min.js');?>"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?= base_url('public/mdb_hack/js/mdb.min.js');?>"></script>

        <script>
            // object-fit polyfill run
            objectFitImages();

            /* init Jarallax */
            jarallax(document.querySelectorAll('.jarallax'));

            jarallax(document.querySelectorAll('.jarallax-keep-img'), {
                keepImg: true,
            });
        </script>
        <script>
            new WOW().init();
        </script>
</div>
<div class='bg-light p-4 m-2'>
     <footer class='text-center'>Copyright <em>&copy; 2018 </em>K.H. All Rights Reserved</footer>    
</div>
</body>
</html>