<!--   Core JS Files   -->
<script src="{{ asset('./dashboard/js/jquery.min.js') }}"></script>
<script src="{{ asset('./dashboard/js/popper.min.js') }}"></script>
<script src="{{ asset('./dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('./dashboard/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('./dashboard/js/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('./dashboard/js/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('./dashboard/js/now-ui-dashboard.js?v=1.5.0') }}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('./dashboard/js/demo.js') }}"></script>

<script>
    $("#logout").click(function (e) {
        e.preventDefault();
        console.log("ok");
        $("#logout_form").submit();
    });
</script>
@yield("js")
</body>

</html>
