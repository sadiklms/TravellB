<h1 class="rlr-search-results-header__value ">
              Showing {{$tripcount}}
             results for
              <strong> 
              @if($trip=='location-trip')
              @php  $location_type=DB::table('locationtypes')->where('id',$id)->first();  @endphp
              {{$location_type->title}}
              @elseif($trip=='type-trip')
              @php  $location_type=DB::table('types')->where('id',$id)->first();  @endphp
              {{$location_type->title}}
              @elseif($trip=='specialfeature-trip')
              @php  $location_type=DB::table('specialfeatures')->where('id',$id)->first();  @endphp
              {{$location_type->title}}

              @elseif($trip=='areatype-trip')
              @php  $location_type=DB::table('areatypes')->where('id',$id)->first();  @endphp
              {{$location_type->title}}
              @endif
             </strong> 
            </h1>