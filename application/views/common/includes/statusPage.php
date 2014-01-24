<script type="text/javascript">
<?php if ($url != false) { ?>
        setTimeout(function() {
            window.location.replace("<?= $url ?>");
        }, 2000);
<?php } ?>
</script>
<fieldset>
    <legend>Status</legend>
    <div class="<?php echo $status ?>" style="margin: 0 auto;width: 100%">
        <?php echo $message; ?>
    </div>
</fieldset>


<style type="text/css">
    .good {
        font-size: 20px;
        color: rgb(75, 204, 75);
        margin: 0 auto;
        width: 100%;
    }

    .bad {
        font-size: 20px;
        color: rgb(255, 0, 0);
        margin: 0 auto;
        width: 100%;
    }
</style>