<footer class="bg-footer p-2">
    <div class="container p-7 mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url(); ?>/img/logo.png" alt="" srcset="">
                <p class="mt-5 text-light">Email : info@perpusnas</p>
                <p class="text-light">Jl. Medan MErdeka Selatan No. 11A</p>
            </div>
            <div class="col-md-6 text-light">
                <h3 class="mx-auto">Layanan Utama</h3>
                <div class="row mt-4">
                    <div class="col-12">
                        <ul class="p-4">
                            <li class="d-inline-block p-2">ISBN</li>
                            <li class="d-inline-block p-2">OPAC</li>
                            <li class="d-inline-block p-2">OneSearch</li>
                            <li class="d-inline-block p-2">iPusnas</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>@copyright</h3>
            </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="<?= base_url(); ?>/mdb.es.min.js"></script>
<script src="<?= base_url(); ?>/mdb.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script type="module">
    const nav = document.getElementById('navigation');

    // Add an event listener to the document
    // so that a class is added to the nav
    // element when the page is scrolled
    document.addEventListener('scroll', () => {
        nav.classList.add('fixed-top', 'bg-light', 'navbar-light', 'shadow-sm');
        nav.classList.remove('bg-transparent', 'navbar-dark');

        // After 1s, check if the user has scrolled to
        // the top of the page and make the nav
        // element transparent again
        setTimeout(() => {
            if (window.pageYOffset === 0 && nav.classList.contains('fixed-top')) {
                nav.classList.remove('fixed-top', 'navbar-light', 'shadow-sm');
                nav.classList.add('bg-transparent', 'navbar-dark');

            }
        }, 1000);
    });
</script>


</body>

</html>