
<?php get_header(); ?>
    <!-- Home -->

    <div class="home">
      <div class="breadcrumbs_container">
        <div class="image_header">
          <div class="header_info">
            <!--カテゴリー情報から、スラッグ（event）とカテゴリ名（イベント）を取り出して表示  -->
          <?php
               $cat = get_the_category();
               $catslug = $cat[0]->slug;
               $catname = $cat[0]->cat_name;
             ?>
             <div><?php echo $catslug; ?></div>
             <div><?php echo $catname; ?></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Course -->

    <div class="course">
      <div class="row content-body">
        <!-- Course -->
        <div class="col-lg-8">
          <!-- Course Tabs -->
          <div class="course_tabs_container">
            <div class="tab_panels">
              <!-- Description -->
              <div class="tab_panel">
              <div class="tab_panel_title"><?php echo $catname; ?></div>
                <div class="tab_panel_content">
                  <div class="tab_panel_text">
                    <!-- news loop from here-->

                    <!-- 投稿があるかチェックする -->
                    <?php if (have_posts()) : ?>
                        <!-- 投稿があるかチェックし投稿を取得する -->
                       <?php while(have_posts()) : the_post(); ?>
                       <div class="news_posts_small">
                       <div class="row">
                         <div class="col-lg-2 col-md-2 col-sx-12">
                           <div class="calendar_news_border">
                             <div class="calendar_news_border_1">
                               <div class="calendar_month">
                                <!-- カテゴリーを判定 -->
                               <?php 
                                  if( is_category('event') || is_category('graduates') ) :
                                     echo post_custom('month');
                                   else:
                                     echo get_post_time('F');
                                   endif;
                                 ?>
                               </div>
                               <div class="calendar_day">
                                 <span>
                                <!-- カテゴリーを判定 -->
                                 <?php 
                                   if( is_category('event') || is_category('graduates') ) :
                                     echo post_custom('day');
                                   else:
                                     echo get_the_date('d');
                                   endif;
                                   ?>
                                 </span>
                               </div>
                             </div>
                           </div>
                           <div class="calendar_hour"></div>
                         </div>
                         <div class="col-lg-10 col-md-10 col-sx-12">
                         <div class="news_post_small_title">
                            <!-- 投稿データのパーマリンクを取得 -->
                             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           </div>
                           <div class="news_post_meta">
                             <ul>
                               <li>
                                <!-- 文字列を切り取り、尾末を'...'に変更 -->
                                 <?php echo wp_trim_words( get_the_content() , 100, '...'); ?>
                               </li>
                             </ul>
                           </div>
                           <div class="read_continue">
                            <!-- 投稿データのパーマリンクを取得 -->
                           <button><a href="<?php the_permalink(); ?>" class="text-white">詳細を見る</a></button>
                           </div>
                         </div>
                       </div>
                       <hr />
                     </div>
                     <?php endwhile; ?>
                     <?php endif; ?>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4" style="background-color: #2b7b8e33">
        
        <?php get_sidebar(); ?>
        </div>
      </div>
    </div>

    <?php get_footer( ); ?>