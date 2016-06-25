<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"C:\WWW\thinkphp\10\public/../application/index\view\public\error.html";i:1466502628;}*/ ?>
<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>提示信息</title>

    <meta name="description" content="modals and wells" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" />
    <link href="/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>

    <!--Danger Modal Templates-->
    <div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-fire"></i>
                </div>
                <div class="modal-title">Error</div>

                <div class="modal-body"><?php echo $msg; ?></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Danger Modal Templates-->

    <!--End Modal Templates-->
    <!--Basic Scripts-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    <script src="/assets/js/bootbox/bootbox.js"></script>

    <script type="text/javascript">
    	$(function(){
    		$('#modal-danger').modal('toggle').on('hidden.bs.modal',function(e){
	     		<?php if($url == ''): ?>
	     			history.go(-1);
	     		<?php else: ?>
	     			window.location.href = "<?php echo $url; ?>";
	     		<?php endif; ?>		
    		});
    		<?php if($url == ''): ?>
    			setTimeout(function(){
    				history.go(-1);
    			},<?php echo $wait; ?>*1000);
    		<?php else: ?>
    			setTimeout(function(){
    				window.location.href="<?php echo $url; ?>";
    			},<?php echo $wait; ?>*1000);
    		<?php endif; ?>
    	})
    </script>
</body>
</html>
