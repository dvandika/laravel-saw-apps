        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="{{ route('home') }}">{{ config('app.name', 'SAW.Apps') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                Powered by <b><a href="http://github.com/dvandika">@dvandika</a></b>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/assets/dist/js/adminlte.js"></script>
    <!-- Page Script -->
    @yield('js')
</body>
</html>