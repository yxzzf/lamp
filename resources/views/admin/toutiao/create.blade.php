@extends('layouts.index') @section('title') 头条添加 @endsection @section('title','头条添加') 
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $title or '' }}</font></font></span>
          </div>
          <div class="mws-panel-body no-padding">
               <form class="mws-form" action="/admin/toutiao" method="post">
                    {{ csrf_field() }}
                    <div class="mws-form-inline">
                         <div class="mws-form-row">
                              <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头条标题</font></font></label>
                              <div class="mws-form-item">
                                   <input type="text" class="small" name="title">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头条内容</font></font></label>
                              <div class="mws-form-item">
                                    <script id="container" name="content" type="text/plain" >
                                        
                                   </script>
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
</div>
<!-- 配置文件 -->
<script type="text/javascript" src="/admin/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/admin/utf8-php/ueditor.all.js"></script>
 <!-- 实例化编辑器 -->
<script type="text/javascript">
   var ue = UE.getEditor('container',{toolbars:[
          ['fullscreen','source','undo','redo','bold']
     ]});
</script>
@endsection