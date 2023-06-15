@props(['title','description','type','color' =>'info'])
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-{{$type}} shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-{{$color}} text-uppercase mb-1">{{$title}}
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$description}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                   {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>