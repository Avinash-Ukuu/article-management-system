 <section class="wrapper__section p-0">
     <div class="wrapper__section__components">
         <!-- Footer -->
         <footer>
             <div class="wrapper__footer bg__footer-dark pb-0">
                 <div class="container">
                                 @php
                                        $categories = \App\Models\Category::query()->activeOrdered()->orderBy('position')->orderBy('id')
                                                        ->get([
                                                            'id',
                                                            'name',
                                                            'slug',
                                                            'position',
                                                        ]);
                                 @endphp
                     <div class="row">
                        @foreach($categories as $category)
                            <div class="col-md-3">
                                <div class="widget__footer">
                                    <ul class="list-unstyled option-content ">
                                        <li>
                                            <a href="{{ route('category.show', $category->slug) }}">{{$category->name}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                     </div>
                 </div>
                 <div class="mt-4">
                     <div class="container">
                         <div class="row">
                             <div class="col-md-4">
                                 <figure class="image-logo">
                                     <img src="{{ asset('assets/frontend/images/logo_with_white.png') }}" alt=""
                                         class="logo-footer">
                                 </figure>
                             </div>
                             <div class="col-md-8 my-auto ">

                                 <div class="social__media">

                                     <ul class="list-inline">

                                         <li class="list-inline-item">
                                             <a href="#" class="btn btn-social rounded text-white facebook">
                                                 <i class="fa fa-facebook"></i>
                                             </a>
                                         </li>
                                         <li class="list-inline-item">
                                             <a href="#" class="btn btn-social rounded text-white twitter">
                                                 <i class="fa fa-twitter"></i>
                                             </a>
                                         </li>
                                         <li class="list-inline-item">
                                             <a href="#" class="btn btn-social rounded text-white whatsapp">
                                                 <i class="fa fa-whatsapp"></i>
                                             </a>
                                         </li>
                                         <li class="list-inline-item">
                                             <a href="#" class="btn btn-social rounded text-white telegram">
                                                 <i class="fa fa-telegram"></i>
                                             </a>
                                         </li>
                                         <li class="list-inline-item">
                                             <a href="#" class="btn btn-social rounded text-white linkedin">
                                                 <i class="fa fa-linkedin"></i>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Footer bottom -->
             <div class="wrapper__footer-bottom bg__footer-dark">
                 <div class="container ">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="border-top-1 bg__footer-bottom-section">
                                 <ul class="list-inline link-column">
                                     <li class="list-inline-item">
                                         <a href="{{ route('category-list') }}">
                                             categories
                                         </a>
                                     </li>
                                     <li class="list-inline-item">
                                         <a href="{{ route('about') }}">
                                             about us
                                         </a>
                                     </li>

                                     <li class="list-inline-item">
                                         <a href="{{ route('sitemap') }}">
                                             sitemap
                                         </a>
                                     </li>

                                 </ul>
                                 <ul class="list-inline">
                                     <li class="list-inline-item">
                                         <span>
                                             © 2026 <a href="http://www.nastservices.com/" target="_blank" title="Premium news">NAST
                                                 Services</a>
                                             .
                                         </span>
                                     </li>
                                 </ul>

                             </div>

                         </div>
                     </div>
                 </div>

             </div>
         </footer>
     </div>
 </section>
