<div class="charity-profile" style="background-image: url(/images/charity/1/cover.jpg)">
  <div class="charity-profile-header">
    @if(!empty($charity->logo))
    <img class="charity-profile-logo" src="{{$charity->logo}}">
    @else
    <div class="clearfix margin-top-100"></div>
    <div class="clearfix margin-top-20"></div>
    @endif
    <div class="charity-profile-content">
      <h2>{{$charity->name}}</h2>
    </div>
    <div class="tagging-item-list">
      <span class="tagging-item">
        <div class="location-name"><i class="fa fa-map-marker"></i>{{$charity->province->name}}</div>
      </span>
      <span class="tagging-item">
        <div class="location-name"><i class="fa fa-flag"></i>{{$charity->charityType->name}}</div>
      </span>
    </div>
    <div class="clearfix margin-bottom-10"></div>
    <div class="tagging-item-list">
      <span class="tagging-item">
        <div class="location-name"><i class="fa fa-tasks"></i>{{$_totalProject}}</div>
      </span>
      <span class="tagging-item">
        <div class="location-name"><i class="fa fa-sticky-note"></i>{{$_totalNews}}</div>
      </span>
      <span class="tagging-item">
        <div class="location-name"><i class="fa fa-video-camera"></i>{{$_totalVideo}}</div>
      </span>
    </div>
  </div>
</div>