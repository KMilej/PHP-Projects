<?php
# Script basic.Connect.php

$pageTitle = 'Main';

include('header.php');
?>

<section class="user-menu">


<div class="container" style="max-width: 50%;">
    <div class="text-center mt-5 mb-4">
        <h2>Live Search in Products</h2>
    </div>
    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search for products...">
    <div id="searchresult"></div> <!-- Wyniki wyszukiwania -->
</div>

.


</section>

<div id="searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var input = $(this).val();

            if (input !== "") {
                $.ajax({
                    url: "livesearch.php",  // Właściwa nazwa pliku obsługującego wyszukiwanie
                    method: "POST",
                    data: { input: input },
                    success: function(data) {
                        $("#searchresult").html(data).show();
                    }
                });
            } else {
                $("#searchresult").hide();
            }
        });
    });
</script>



<?php
include('footer.php');
?>