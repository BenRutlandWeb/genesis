<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
    <?php echo app('files')->get(app()->basePath('templates/emails/theme/default.css')); ?>

</style>
</head>
<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">

<?php if (! empty(trim($__env->yieldContent('header')))): ?>
    <tr>
        <td class="header">
            <a href="<?php echo $url; ?>" style="display: inline-block;">
                <?php echo $__env->yieldContent('header'); ?>
            </a>
        </td>
    </tr>
<?php endif; ?>


<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
<?php echo $__env->yieldContent('body'); ?>
</td>
</tr>
</table>
</td>
</tr>
<?php if (! empty(trim($__env->yieldContent('footer')))): ?>
    <tr>
        <td>
            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td class="content-cell" align="center">
                        <?php echo $__env->yieldContent('footer'); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
<?php endif; ?>
</table>
</td>
</tr>
</table>
</body>
</html>
<?php /**PATH /app/public/wp-content/themes/genesis/templates/emails/layout.blade.php ENDPATH**/ ?>