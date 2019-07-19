@if (!empty(session('Alert')))
    <div class="alert-mess" id="hide">
            <i class="fa fa-times" style="position:absolute;top:10px;right:10px"></i>
        <div>
            <i class="fa fa-check" style="margin-right:5px;font-size:18px"></i>
            <span>{{ session(session('Alert')) }}</span> 
        </div>
    </div>  
@endif