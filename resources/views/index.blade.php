@extends('layout.header')
@section('content')
    <main>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
            <h4>{{ !empty($message)? $message : '' }}</h4>
            <!-- First Photo Grid-->
            <div class="w3-row-padding w3-padding-16 w3-center" id="post">
                @foreach($posts as $post)
                    <div class="w3-quarter">
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" style="width:100%">
                        <h3>{{ $post['title'] }}</h3>
                        <p>{{ $post['description'] }}</p>
                        <span>total rate: {{ $post['rate'] }}</span>
                        <form action="" method="post">
                            @csrf
                            <input name="id" type="hidden" value="{{ $post['id'] }}">
                            <button name="like" type="submit"
                                    class="w3-button w3-theme-d1 w3-margin-bottom w3-green w3-round">
                                <i class="fa fa-thumbs-up"></i>  Like
                            </button>
                            <button name="dislike" type="submit"
                                    class="w3-button w3-theme-d2 w3-margin-bottom w3-red w3-round">
                                <i class="fa fa-thumbs-down"></i>  Dislike
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Footer -->
            <footer class="w3-row-padding w3-padding-32">
                <div class="w3-third">
                    <h3>FOOTER</h3>
                    <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae,
                        ultricies congue gravida diam non fringilla.</p>
                    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
                </div>

                <div class="w3-third">
                    <h3>BLOG POSTS</h3>
                    <ul class="w3-ul w3-hoverable" id="footer_post">
                        @foreach($posts as $post)
                            @if($post['id']<4
)
                                <li class="w3-padding-16">
                                    <img src="{{ $post['image'] }}" class="w3-left w3-margin-right" style="width:50px">
                                    <span class="w3-large">{{ $post['title'] }}</span><br>
                                    <span class="des">{{ $post['description'] }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="w3-third w3-serif">
                    <h3>POPULAR TAGS</h3>
                    <p>
                        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span
                            class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
                    </p>
                </div>
            </footer>
            <!-- End page content -->
        </div>
    </main>
@endsection
