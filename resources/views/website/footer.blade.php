<section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 pr-lg-4">
          <h5>About Us</h5>
          <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
        </div>
        <div class="col-md-3">
          <h5>Categories</h5>
          <ul>
            @php
              use App\Models\Category;
              $data = Category::all();
              foreach($data as $item){
            @endphp
                <li class="text-capitalize">
                  <a class="text-dark" href="{{route('category', $item->id)}}">{{$item->cat_name}}</a>
                </li>
            @php
              }
            @endphp
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            List
          </h5>
          <ul>
            <li>
              randomised
            </li>
            <li>
              words which
            </li>
            <li>
              don't look even
            </li>
            <li>
              slightly
            </li>
            <li>
              believable. If you
            </li>
            <li>
              are going to use
            </li>
            <li>
              a passage of
            </li>
            <li>
              Lorem Ipsum,
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="social_container">
            <h5>
              Follow Us
            </h5>
            <div class="social-box">
              <a target="_blank" href="https://www.facebook.com/grapfood">
                <img src="{{url('')}}/website/static/fb.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>