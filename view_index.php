<?php
    session_start();
    $_page = 'flights';
    require_once __DIR__.'/comp-header.php';
?>
<div id="content-menu-flex">
    <?php require_once __DIR__.'/comp-navigation.php'?>
    <div id="content">
    <div class="<?= $language == 'dk' ? 'dk-result-height' : 'en-result-height' ?>" id="from-results"></div>
    <div class="<?= $language == 'dk' ? 'dk-result-height' : 'en-result-height' ?>"  id="to-results"></div>
      <div class="header-match-margin"></div>
      <div id="flight-search">
          <div class="title-container">
              <h1 class="title-main"><?= $dictionairy[$language.'_front_page_welcome']?></h1>
          </div>
          <form id="frontpage-search" onsubmit="validate(validateSearch); return false">
              <div id="frontpage-search-minus-button">
              <div id="from-container">
                  <input 
                      type="text" "
                      placeholder="<?=$dictionairy[$language.'_from']?>?" 
                      name="from_input" 
                      id="from-input"  
                      data-validate="str"
                      data-min="<?= _FROM_INPUT_MIN_LEN ?>"
                      data-max="<?= _FROM_INPUT_MAX_LEN ?>"
                      onfocus="showFromResults()" 
                      oninput="showFromResults()" 
                      onblur="hideFromResults()" 
                  >
              </div>
              <button onclick="switchDirection()" type="button" id="switch-direction">
                  <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.57832 14.2783C6.66651 14.1901 6.77122 14.1201 6.88646 14.0724C7.00171 14.0246 7.12523 14 7.24998 14C7.37472 14 7.49824 14.0246 7.61349 14.0724C7.72873 14.1201 7.83344 14.1901 7.92163 14.2783C8.00986 14.3665 8.07985 14.4712 8.1276 14.5865C8.17535 14.7017 8.19993 14.8252 8.19993 14.95C8.19993 15.0747 8.17535 15.1983 8.1276 15.3135C8.07985 15.4288 8.00986 15.5335 7.92163 15.6216L3.84347 19.7H22.45C22.7019 19.7 22.9436 19.8001 23.1217 19.9782C23.2999 20.1564 23.4 20.398 23.4 20.65C23.4 20.9019 23.2999 21.1436 23.1217 21.3217C22.9436 21.4999 22.7019 21.6 22.45 21.6H3.84347L7.92163 25.6783C8.00986 25.7665 8.07985 25.8712 8.1276 25.9865C8.17535 26.1017 8.19993 26.2253 8.19993 26.35C8.19993 26.4747 8.17535 26.5983 8.1276 26.7135C8.07985 26.8288 8.00986 26.9335 7.92163 27.0216C7.83344 27.1099 7.72873 27.1799 7.61349 27.2276C7.49824 27.2754 7.37472 27.2999 7.24998 27.2999C7.12523 27.2999 7.00171 27.2754 6.88646 27.2276C6.77122 27.1799 6.66651 27.1099 6.57832 27.0216L0.878326 21.3216C0.790095 21.2335 0.720104 21.1287 0.672352 21.0135C0.624599 20.8983 0.600021 20.7747 0.600021 20.65C0.600021 20.5252 0.624599 20.4017 0.672352 20.2865C0.720104 20.1712 0.790095 20.0665 0.878326 19.9783L6.57832 14.2783ZM23.1218 8.02184C23.3 7.84368 23.4001 7.60204 23.4001 7.35009C23.4001 7.09814 23.3 6.8565 23.1218 6.67834L17.4218 0.978345C17.2424 0.806167 17.0027 0.711158 16.7541 0.713703C16.5055 0.716248 16.2678 0.816145 16.0919 0.991958C15.9161 1.16777 15.8162 1.40549 15.8137 1.65412C15.8111 1.90274 15.9061 2.14246 16.0783 2.32183L20.1565 6.39999H1.54998C1.29802 6.39999 1.05638 6.50008 0.878224 6.67824C0.700065 6.8564 0.599976 7.09804 0.599976 7.34999C0.599976 7.60195 0.700065 7.84359 0.878224 8.02175C1.05638 8.19991 1.29802 8.29999 1.54998 8.29999H20.1565L16.0783 12.3782C15.9895 12.4662 15.9189 12.571 15.8706 12.6864C15.8224 12.8018 15.7974 12.9257 15.7971 13.0508C15.7969 13.1759 15.8213 13.2998 15.869 13.4154C15.9168 13.5311 15.9869 13.6361 16.0754 13.7246C16.1638 13.8131 16.2689 13.8832 16.3845 13.9309C16.5002 13.9787 16.6241 14.0031 16.7492 14.0028C16.8743 14.0026 16.9981 13.9776 17.1136 13.9293C17.229 13.8811 17.3337 13.8105 17.4218 13.7216L23.1218 8.02184Z" fill="black"/>
                  </svg>
              </button>
              <div id="to-container">
                  <input 
                  type="text" 
                  placeholder="<?=$dictionairy[$language.'_to']?>?" 
                  name="to_input" 
                  id="to-input" 
                  data-validate="str"
                  data-min="<?= _TO_INPUT_MIN_LEN ?>"
                  data-max="<?= _TO_INPUT_MAX_LEN ?>"
                  onfocus="showToResults()" 
                  oninput="showToResults()" 
                  onblur="hideToResults()" 
                  >
              </div>
              </div>
              <button id="search-button"><?=$dictionairy[$language.'_search']?></button>
          </form>
      </div>
      <main>
        <section id="why_choose_momondo">
          <h2 class="title"><?=$dictionairy[$language.'_why_choose_momondo']?></h2>
          <div class="argument-container">
            <div class="argument_why">
              <div class="left"><?= $discountsSVG ?></div>
              <div class="right">
                <p class="top"><?=$dictionairy[$language.'_why1']?></p>
                <p class="bottom"><?=$dictionairy[$language.'_why1_text']?></p>
              </div>
            </div>

            <div class="argument_why">
              <div class="left"><?php if ($language == 'dk'){echo $flexibilitySVG;} else{echo $okaySVG;}?></div>
              <div class="right">
                <p class="top"><?=$dictionairy[$language.'_why2']?></p>
                <p class="bottom"><?=$dictionairy[$language.'_why2_text']?></p>
              </div>
            </div>

            <div class="argument_why">
              <div class="left"><?php if ($language == 'dk'){echo $co2SVG;} else{echo $flexibilitySVG;}?></div>
              <div class="right">
                <p class="top"><?=$dictionairy[$language.'_why3']?></p>
                <p class="bottom"><?=$dictionairy[$language.'_why3_text']?></p>
              </div>
            </div>

            <div class="argument_why">
              <div class="left"><?php if ($language == 'dk'){echo $mobileSVG;} else{echo $trustedSVG;}?></div>
              <div class="right">
                <p class="top"><?=$dictionairy[$language.'_why4']?></p>
                <p class="bottom"><?=$dictionairy[$language.'_why4_text']?></p>
              </div>
            </div>
          </div>
        </section>

        <section id="article-preview">
          <div class="card">
            <div class="img-container"></div>
            <div class="text-content">
              <h3><?=$dictionairy[$language.'_september_destinations']?></h3>
              <p><?=$dictionairy[$language.'_september_destinations_text']?></p>
              <button class="btn purple-bg"><?=$dictionairy[$language.'_read_article']?></button>
            </div>
          </div>
        </section>

        <section class="current-destinations">
          <div class="flex">
            <div>
              <h2 class="title"><?=$dictionairy[$language.'_current_destinations']?></h2>
              <p><?=$dictionairy[$language.'_current_destinations_text']?></p>
            </div>
            <button class="btn"><?=$dictionairy[$language.'_see_all']?></button>
          </div>

          <div class="medium-card-container">
        
              <div class="arrow-flex">
                <div class="card-arrow ca-left hide">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="JRE_-arrow-svg" role="img" cleanup="">
                    <path d="M120.002 160a4.987 4.987 0 0 1-3.702-1.637l-50-55a5 5 0 0 1 0-6.727l50-55a5 5 0 0 1 7.4 6.727L76.757 100l46.943 51.637a5 5 0 0 1-3.698 8.363z"></path>
                  </svg>
                </div>
                <div class="card-arrow ca-right">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="JRE_-arrow-svg" role="img" cleanup="">
                    <path d="M79.999 160a5 5 0 0 1-3.698-8.363L123.243 100L76.3 48.363a5 5 0 0 1 7.399-6.727l50 55a5.002 5.002 0 0 1 0 6.727l-50 55a4.986 4.986 0 0 1-3.7 1.637z"></path>
                  </svg>
                </div>
              </div>
              <div class="medium-card">
                <div class="bg austria-img">
                  <div class="tag"><?=$dictionairy[$language.'_open']?></div>
                </div>
                <div>
                <p class="city-name-on-card"><?=$dictionairy[$language.'_austria']?></p>
                <p class="info-on-card">
                  <?=$dictionairy[$language.'_info_vaccinated']?> <br />
                  <?=$dictionairy[$language.'_mask_required']?>
                </p>
              </div>
              </div>

              <div class="medium-card show-on-tablet">
                <div class="bg portugal-img">
                  <div class="tag"><?=$dictionairy[$language.'_open']?></div>
                </div>
                <div>
                  <p class="city-name-on-card"><?=$dictionairy[$language.'_portugal']?></p>
                  <p class="info-on-card">
                    <?=$dictionairy[$language.'_info_vaccinated']?>
                  </p>
                </div>
              </div>
            </div>
       
        </section>

        <section class="popular-cities">
          <div class="small-header-duo">
            <h2> <?=$dictionairy[$language.'_trending_cities']?></h2>
            <h5> <?=$dictionairy[$language.'_trending_cities_text']?></h5>
          </div>

          <div class="card-flex">
            <div class="destination-card">
              <div id="niceIMG" class="bg"></div>
              <div class="destination-card-text">
                <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                <p class="city-name-on-card"><?=$dictionairy[$language.'_nice']?></p>
              </div>
            </div>

            <div class="destination-card">
              <div id="berlinIMG" class="bg"></div>
              <div class="destination-card-text">
                <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                <p class="city-name-on-card"><?=$dictionairy[$language.'_berlin']?></p>
              </div>
            </div>

            
              <div class="destination-card">
                <div id="alicanteIMG" class="bg"></div>
                <div class="destination-card-text">
                  <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                  <p class="city-name-on-card"><?=$dictionairy[$language.'_alicante']?></p>
                </div>
              </div>
    
              <div class="destination-card">
                <div id="milanIMG" class="bg"></div>
                <div class="destination-card-text">
                  <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                  <p class="city-name-on-card"><?=$dictionairy[$language.'_milan']?></p>
                </div>
              </div>

              
            <div class="destination-card">
              <div id="athensIMG" class="bg"></div>
              <div class="destination-card-text">
                <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                <p class="city-name-on-card"><?=$dictionairy[$language.'_athens']?></p>
              </div>
            </div>

            <div class="destination-card">
              <div id="lisbonIMG" class="bg"></div>
              <div class="destination-card-text">
                <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                <p class="city-name-on-card"><?=$dictionairy[$language.'_lisbon']?></p>
              </div>
            </div>

            
              <div class="destination-card">
                <div id="budabestIMG" class="bg"></div>
                <div class="destination-card-text">
                  <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                  <p class="city-name-on-card"><?=$dictionairy[$language.'_budapest']?></p>
                </div>
              </div>
    
              <div class="destination-card">
                <div id="pragueIMG" class="bg"></div>
                <div class="destination-card-text">
                  <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                  <p class="city-name-on-card"><?=$dictionairy[$language.'_prague']?></p>
                </div>
              </div>

              <div class="destination-card">
                <div id="stockholmIMG" class="bg"></div>
                <div class="destination-card-text">
                  <p class="fly-til"><?=$dictionairy[$language.'_flights_to']?></p>
                  <p class="city-name-on-card"><?=$dictionairy[$language.'_stockholm']?></p>
                </div>
              </div>
          </div>
        </section> 

        <section class="seo-section">
          <div class="small-header-duo">
            <h2><?=$dictionairy[$language.'_seo_h2']?></h2>
            <h5><?=$dictionairy[$language.'_seo_h5']?></h5>
            <p><?=$dictionairy[$language.'_seo_p']?></p>
          </div>
          <div class="link-container">
            <div class="link-group">
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_copenhagen']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_malaga']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_london']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_paris']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_bangkok']?></a>
              </div>
            </div>
            <div class="link-group">
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_istanbul']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_barcelona']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_palma_de_mallorca']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_rome']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_new_york']?></a>
              </div>
            </div>
            <div class="link-group">
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_antalya']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_billund']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_amsterdam']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_aalborg']?></a>
              </div>
              <div class="link">
                <a href=""><?=$dictionairy[$language.'_dubai']?></a>
              </div>
            </div>
          </div>
        </section>

        <section class="qa-section">
          <div class="small-header-duo">
            <h2><?=$dictionairy[$language.'_seo_qa_h2']?></h2>
          </div>
          <div class="qa-container">
            <div class="qa-group">
              <div class="qa">
                <div class="qa-header" onclick="toggleQA()">
                  <p><?=$dictionairy[$language.'_seo_qa1']?></p>
                  <button class="down"><?=$rightArrowSVG?></button>
                </div>
                <div class="qa-answer collapsed"><?=$dictionairy[$language.'_seo_qa1_answer']?></div>
              </div>
              <div class="qa">
                <div class="qa-header" onclick="toggleQA()">
                  <p><?=$dictionairy[$language.'_seo_qa2']?></p>
                  <button class="down"><?=$rightArrowSVG?></button>
                </div>
                <div class="qa-answer collapsed"><?=$dictionairy[$language.'_seo_qa2_answer']?></div>
              </div>
            </div>

            <div class="qa-group">
              <div class="qa">
                <div class="qa-header" onclick="toggleQA()">
                  <p><?=$dictionairy[$language.'_seo_qa3']?></p>
                  <button class="down"><?=$rightArrowSVG?></button>
                </div>
                <div class="qa-answer collapsed"><?=$dictionairy[$language.'_seo_qa3_answer']?></div>
              </div>
              <div class="qa">
                <div class="qa-header" onclick="toggleQA()">
                  <p><?=$dictionairy[$language.'_seo_qa4']?></p>
                  <button class="down"><?=$rightArrowSVG?></button>
                </div>
                <div class="qa-answer collapsed"><?=$dictionairy[$language.'_seo_qa4_answer']?></div>
              </div>
            </div>
          </div>
        </section>

      </main>
      <?php require_once __DIR__.'/comp-footer.php'?>
    </div>
</div>

