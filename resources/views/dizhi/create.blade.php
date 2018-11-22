@extends('layouts.index')
@section('content')
<head>
<!-- 地址 start -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script> 
<script src="/dizhi/js/distpicker.data.js"></script>
<script src="/dizhi/js/distpicker.js"></script>
<script src="/dizhi/js/main.js"></script> 
<!-- 地址 end -->
</head>
    <body>
	<div class="mws-panel grid_8">
                	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title or ''}}</font></font></span>

                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/dizhi" method="post">
                    		    {{ csrf_field() }}
                    		<div class="mws-form-inline">
										<div class="mws-form-row">
                    			
                    			</div>          			
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">收货人</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="uname" value="">
                    				</div>
                    			</div>
 								<div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电话</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="phone" value="">
                    				</div>
                    			</div>
                    			
                    			<div class="input-field col s8 mws-form-row">
                        <div data-toggle="distpicker">
                           <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font></label>
                            <div class="form-group">
                                <select class="form-control" id="province1" name="sheng"></select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="city1" name="shi"></select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="district1" name="xian"></select>
                            </div>
                        </div>
                        <div class="mws-form-row">
                    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">详细地址</font></font></label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="xd">
                    				</div>
                    	</div>  
                    </div>        			
                    		</div>
                    		<div class="mws-button-row">
                    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="提交" class="btn btn-danger"></font></font>
                    			<input type="reset" value="Reset" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>

</body>

@endsection