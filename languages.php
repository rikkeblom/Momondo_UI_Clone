<?php
    $languagesAllowed = ['en', 'dk'];
    $language = $_GET['language'] ?? 'en';

    if( ! in_array($language, $languagesAllowed )){
        $language = 'en';
    }

    $dictionairy = [
        'en_search' => 'Search', 
        'dk_search' => 'Søg',

        'en_from' => 'From', 
        'dk_from' => 'Fra',

        'en_to' => 'To', 
        'dk_to' => 'Til',

        'en_home' => 'Home', 
        'dk_home' => 'Hjem',

        'en_feedback' => 'Send os feedback', 
        'dk_feedback' => 'Send us feedback',

        'en_signin' => 'Sign In', 
        'dk_signin' => 'Log Ind',

        'en_404' => '404', 
        'dk_404' => '404',

        'en_no_page' => 'Sorry, we could not find that page.', 
        'dk_no_page' => 'Vi fandt desværre ikke denne side.',

        'en_flights' => 'Flights', 
        'dk_flights' => 'Fly',

        'en_stays' => 'Stays', 
        'dk_stays' => 'Overnatning',

        'en_carrental' => 'Car Rental', 
        'dk_carrental' => 'Biludlejning',

        'en_thingstodo' => 'Things to do', 
        'dk_thingstodo' => 'Oplevelser',

        'en_packages' => 'Packages', 
        'dk_packages' => 'Pakkerejser',

        'en_explore' => 'Explore', 
        'dk_explore' => 'Explore',

        'en_travelrestrictions' => 'Travel Restrictions', 
        'dk_travelrestrictions' => 'Rejserestriktioner',

        'en_ferries' => 'Ferries', 
        'dk_ferries' => 'Færger',

        'en_trips' => 'Trips', 
        'dk_trips' => 'Trips',

        'en_company' => 'Company', 
        'dk_company' => 'Firma',

        'en_about' => 'About', 
        'dk_about' => 'Om',

        'en_career' => 'Career', 
        'dk_career' => 'Jobmuligheder',

        'en_mobile' => 'Mobile', 
        'dk_mobile' => 'Mobil',

        'en_discover' => 'Discover', 
        'dk_discover' => 'Discover',

        'en_how_we_work' => 'How we work', 
        'dk_how_we_work' => 'Sådan fungerer vi',

        'en_momondo_coupon_codes' => 'Momondo coupon codes', 
        'dk_momondo_coupon_codes' => 'Momondo-kuponkoder',

        'en_contact' => 'Contact', 
        'dk_contact' => 'Kontakt os',

        'en_help_FAQ' => 'Help/FAQ', 
        'dk_help_FAQ' => 'Hjælp/FAQ',

        'en_press' => 'Press', 
        'dk_press' => 'Presse',

        'en_affiliates' => 'Affiliates', 
        'dk_affiliates' => 'Affiliates',

        'en_more' => 'More', 
        'dk_more' => 'Mere',

        'en_airline_fees' => 'Airline fees', 
        'dk_airline_fees' => 'Flyselskabsgebyrer',

        'en_airlines' => 'Airlines', 
        'dk_airlines' => 'Flyselskaber',

        'en_signout' => 'Sign Out',
        'dk_signout' => 'Log ud',

        'en_admin' => 'Admin',
        'dk_admin' => 'Admin',

        'en_front_page_welcome' => 'Find and compare cheap flights',
        'dk_front_page_welcome' => 'Velkommen! Find en fleksibel flybillet til din næste rejse.',
    
        'en_privacy' => 'Privacy',
        'dk_privacy' => 'Privatlivspolitik',

        'en_terms_and_conditions' => 'Terms & Conditions',
        'dk_terms_and_conditions' => 'Vilkår & betingelser',

        'en_ad_choices' => 'Ad Choices',
        'dk_ad_choices' => 'Aftryk',

        'en_signin_title' => 'Sign in or create an account',
        'dk_signin_title' => 'Log ind, eller opret en konto',

        'en_why_choose_momondo' => 'Here’s why travelers choose momondo',
        'dk_why_choose_momondo' => 'Derfor vælger rejsende momondo',

        'en_why1' => 'Best travel deals',
        'dk_why1' => 'De bedste rejsetilbud',

        'en_why1_text' => 'Find the best deals available from 900+ travel sites.',
        'dk_why1_text' => 'Find de bedste tilbud på mere end 900 forskellige rejsesites.',
        
        'en_why2' => 'Search without worry',
        'dk_why2' => 'Bestil med fleksibilitet',

        'en_why2_text' => 'The prices you see aren\'t affected by your searches.',
        'dk_why2_text' => 'Find nemt fly uden ændringsgebyrer.',

        'en_why3' => 'Book with flexibility',
        'dk_why3' => 'Rejs med mindre CO₂',

        'en_why3_text' => 'Easily find flights with no change fees.',
        'dk_why3_text' => 'Se rejsemulighedernes miljømæssige påvirkning.',

        'en_why4' => 'Trusted and free',
        'dk_why4' => 'Anbefales af eksperter',

        'en_why4_text' => 'We’re completely free to use – no hidden charges or fees.',
        'dk_why4_text' => 'momondo-appen er Editor\'s Choice i App Store.',

        'en_september_destinations' => 'Fantastic September destinations',
        'dk_september_destinations' => 'Fantastiske september-destinationer',

        'en_september_destinations_text' => 'Didn\'t get to go on vacation over the summer? September is actually a wonderful time to take an impromptu trip with still good weather but fewer tourists and lower prices',
        'dk_september_destinations_text' => 'Nåede du ikke at komme på ferie over sommeren? September er faktisk en vidunderlig tid at tage en improviseret tur med stadig godt vejr, men færre turister og lavere priser',

        'en_read_article' => 'Read more',
        'dk_read_article' => 'Læs artiklen',
        
        'en_current_destinations' => 'Destinations you can travel to now',
        'dk_current_destinations' => 'Destinationer, du kan rejse til nu',

        'en_current_destinations_text' => 'Popular destinations open to most visitors from Denmark',
        'dk_current_destinations_text' => 'Populære destinationer, som er åbne for de fleste besøgende fra Danmark',
    
        'en_see_all' => 'See all',
        'dk_see_all' => 'Vis alle',

        'en_open' => 'Open',
        'dk_open' => 'Åbent',

        'en_info_vaccinated' => 'Vaccinated travelers can visit',
        'dk_info_vaccinated' => 'Vaccinerede rejsende kan komme på besøg.',

        'en_mask_required' => 'Masks required',
        'dk_mask_required' => 'Mundbind påkrævet',

        'en_flights_to' => 'Flights to',
        'dk_flights_to' => 'Fly til',

        'en_trending_cities' => 'Trending cities',
        'dk_trending_cities' => 'Populære byer',

        'en_trending_cities_text' => 'The most searched for cities on momondo',
        'dk_trending_cities_text' => 'De mest besøgte byer på momondo',

        'en_austria' => 'Austria',
        'dk_austria' => 'Østrig',

        'en_nice' => 'Nice',
        'dk_nice' => 'Nice',

        'en_berlin' => 'Berlin',
        'dk_berlin' => 'Berlin',

        'en_alicante' => 'Alicante',
        'dk_alicante' => 'Alicante',

        'en_milan' => 'Milan',
        'dk_milan' => 'Milano',

        'en_athens' => 'Athens',
        'dk_athens' => 'Athen',

        'en_lisbon' => 'Lisbon',
        'dk_lisbon' => 'Lissabon',

        'en_budapest' => 'Budapest',
        'dk_budapest' => 'Budapest',

        'en_prague' => 'Prague',
        'dk_prague' => 'Prag',

        'en_stockholm' => 'Stockholm',
        'dk_stockholm' => 'Stockholm',
                
        'en_copenhagen' => 'Copenhagen',
        'dk_copenhagen' => 'København',
        
        'en_malaga' => 'Málaga',
        'dk_malaga' => 'Málaga',

        'en_london' => 'London',
        'dk_london' => 'London',
        
        'en_paris' => 'Paris',
        'dk_paris' => 'Paris',

        'en_bangkok' => 'Bangkok',
        'dk_bangkok' => 'Bangkok',
        
        'en_istanbul' => 'Istanbul',
        'dk_istanbul' => 'Istanbul',

        'en_barcelona' => 'Barcelona',
        'dk_barcelona' => 'Barcelona',

        'en_palma_de_mallorca' => 'Palma de Mallorca',
        'dk_palma_de_mallorca' => 'Palma de Mallorca',

        'en_rome' => 'Rome',
        'dk_rome' => 'Rom',

        'en_new_york' => 'New York',
        'dk_new_york' => 'New York',

        'en_antalya' => 'Antalya',
        'dk_antalya' => 'Antalya',

        'en_billund' => 'Billund',
        'dk_billund' => 'Billund',

        'en_amsterdam' => 'Amsterdam',
        'dk_amsterdam' => 'Amsterdam',

        'en_aalborg' => 'Aalborg',
        'dk_aalborg' => 'Aalborg',

        'en_dubai' => 'Dubai',
        'dk_dubai' => 'Dubai',

        'en_portugal' => 'Portugal',
        'dk_portugal' => 'Portugal',

        'en_hello' => 'Hello',
        'dk_hello' => 'Hej',

        'en_select_image' => 'Select image to upload:',
        'dk_select_image' => 'Vælg billede til upload:',

        'en_manage_flights' => 'Manage flights in the database',
        'dk_manage_flights' => 'Administrer fly i databasen',

        'en_upload_image' => 'Upload image',
        'dk_upload_image' => 'Upload billede',

        'en_trips_header' => 'An easier way to manage your trips',
        'dk_trips_header' => 'En nemmere måde at holde styr på dine rejser på',

        'en_trips_explanation' => 'We make it super easy to schedule, organize and travel with friends or family. Trips is free — and available to use no matter where you book.',
        'dk_trips_explanation' => 'Vi gør det supernemt at planlægge, organisere og rejse sammen med venner eller familie. Trips er gratis – og kan bruges, uanset hvor du booker.',

        'en_trips_login_btn' => 'Sign in to plan better',
        'dk_trips_login_btn' => 'Log ind for at planlægge bedre',

        'en_trips_bookings_btn' => 'Find my bookings',
        'dk_trips_bookings_btn' => 'Find mine bookinger',

        'en_site' => 'Site',
        'dk_site' => 'Side',

        'en_country' => 'United States',
        'dk_country' => 'Danmark',

        'en_currency' => 'Currency',
        'dk_currency' => 'Valuta',

        'en_currency_value' => 'United States Dollars',
        'dk_currency_value' => 'Danske Kroner',

        'en_seo_h2' => 'Flight deals by destination',
        'dk_seo_h2' => 'Flytilbud sorteret efter destination',
        
        'en_seo_h5' => 'Find and compare cheap flights',
        'dk_seo_h5' => 'Find og sammenlign billige flybilletter',
        
        'en_seo_p' => 'We search and compare billions of real-time prices on plane tickets so you can easily find the cheapest, quickest, and best flight deals for you.',
        'dk_seo_p' => 'Vi søger og sammenligner milliarder af priser på flybilletter i realtid, så du nemt kan finde de billigste, hurtigste og bedste flytilbud for dig.',
    
        'en_seo_qa_h2' => 'How to find cheap flight deals with momondo',
        'dk_seo_qa_h2' => 'Sådan finder du de bedste tilbud på flybilletter med momondo',

        'en_seo_qa1' => 'How does momondo find such cheap airfare?',
        'dk_seo_qa1' => 'Hvordan finder momondo så billige flypriser?',

        'en_seo_qa1_answer' => 'momondo searches across hundreds of airlines and travel sites, from major booking sites to individual company sites, to give you as many cheap airfare options as possible. When you conduct a single search on momondo, you can find and compare cheap airline tickets like you’ve done hundreds of searches at once.</br></br>momondo is completely free to use - with no hidden charges or fees - and the prices you see are never affected by your searches, no matter how many you make.</br></br>We believe in an open world, where traveling and getting acquainted across borders and cultures is available to us all, so we’re committed to showing you the cheapest flights in our flight finder.',
        'dk_seo_qa1_answer' => 'momondo søger på hundredvis af fly- og rejsesites lige fra de største bookingsites til sites fra enkeltstående virksomheder for at give dig så mange billige flyrejser at vælge imellem som muligt. Når du laver en enkelt søgning på momondo, kan du finde og sammenligne billige flybilletter, som om du havde udført hundredvis af søgninger på én gang.</br></br>momondo er helt gratis at bruge – ingen skjulte opkrævninger eller gebyrer – og de priser, som du ser, påvirkes aldrig af dine søgninger, uanset hvor mange gange du søger.</br></br>Vi tror på en åben verden, hvor rejser og bekendtskaber på tværs af grænser og kulturer kan vælges af os alle, så vi bestræber os på at vise dig de billigste fly i vores flysøgning.',

        'en_seo_qa2' => 'How do I find the best price on plane tickets?',
        'dk_seo_qa2' => 'Hvordan finder jeg den bedste pris på flybilletter?',

        'en_seo_qa2_answer' => 'Choose your destination and preferred travel dates, and we’ll provide you with an overview of the cheapest, quickest, and best flights so you can compare prices and book flights with confidence.</br></br>Flexible on dates? It’s even easier to find cheap flights by using our Price Calendar (found above your search results), which shows you the cheapest travel dates. This is available on all of our most popular flight routes.',
        'dk_seo_qa2_answer' => 'Vælg destination og foretrukne rejsedatoer, så giver vi dig en oversigt over de billigste, hurtigste og bedste fly, så du kan sammenligne priser og føle dig sikker på, at du booker det rette fly.</br></br>Er dine datoer fleksible? Det er endnu nemmere at finde billige fly, hvis du bruger vores priskalender (findes over dine søgeresultater), som viser dig de billigste rejsedatoer. Denne funktion er tilgængelig på alle vores mest populære flyruter.',

        'en_seo_qa3' => 'How can Mix & Match save me money?',
        'dk_seo_qa3' => 'Hvordan sparer jeg penge med Mix & Match?',

        'en_seo_qa3_answer' => 'Sometimes you can save money by combining flight tickets from different suppliers, and we call that Mix & Match. This means you can book your outbound flight with one supplier, and your return flight with another.</br></br>If you can save money by combining tickets from different suppliers, we’ll automatically include this option in your flight results and label it Mix & Match. You’ll have to complete two separate booking flows after you select this deal on our site, but it’s worth it if you can save money over a traditional round-trip with one supplier. It’s an advanced way of getting the cheapest flights even if they’re offered by different suppliers.',
        'dk_seo_qa3_answer' => 'Nogle gange kan du spare penge på at kombinere flybilletter fra forskellige udbydere, og det kalder vi for Mix & Match. Det betyder, at du kan booke rejsen ud hos én udbyder og rejsen hjem hos en anden.</br></br>Hvis du kan spare penge ved at kombinere billetter fra forskellige udbydere, medtager vi automatisk denne mulighed i dine søgeresultater og markerer tilbuddet som Mix & Match. Du skal fuldføre to separate bookinger, når du vælger dette tilbud på vores site, men det er besværet værd, hvis du kan spare penge i forhold til en traditionel returbillet hos én udbyder. Det er en avanceret måde at finde de billigste fly på, også selvom de tilbydes af forskellige udbydere.',

        'en_seo_qa4' => 'How do I make sure I don’t miss a flight deal?',
        'dk_seo_qa4' => 'Hvordan sikrer jeg, at jeg ikke går glip af et godt tilbud på flybilletter?',

        'en_seo_qa4_answer' => 'Sign up for Price Alerts on your favorite flight routes and automatically get live price updates, so you can book flights when the price is right. You can do so next to your flight search results or in the profile menu. If you\'re on our app, you will find Price Alerts in the navigation menu.</br></br>You can also subscribe to special offers and limited-time flight deals from our partners. Just sign in, go to Notifications in your profile and subscribe to the topics you’re interested in.',
        'dk_seo_qa4_answer' => 'Opret en prisagent på dine yndlingsflyruter, så du automatisk får prisopdateringer og kan booke dine flyrejser til den rette pris. Du kan gøre det ud for resultaterne for din flysøgning eller i profilmenuen. Hvis du bruger vores app, finder du Prisagent i navigationsmenuen.</br></br>Du kan også tilmelde dig vores særlige tilbud og tidsbegrænsede rejsetilbud fra vores partnere. Du skal bare logge ind, gå til Notifikationer på din profil og tilmelde dig de emner, der interesserer dig.',

        'en_top_8_cities' => 'Top 8 popular cities',
        'dk_top_8_cities' => 'De 8 mest populære byer',

        'en_top_8_cities_text' => 'See what\'s popular with other travelers',
        'dk_top_8_cities_text' => 'Se, hvad der er populært blandt andre rejsende',

        'en_top_8_cities_card1_header' => 'Las Vegas, NV',
        'dk_top_8_cities_card1_header' => 'København, Danmark',

        'en_top_8_cities_card1_text' => 'Stays from $94+',
        'dk_top_8_cities_card1_text' => 'Ophold fra 127 kr+',

        'en_top_8_cities_card2_header' => 'New York, NY',
        'dk_top_8_cities_card2_header' => 'Aarhus, Danmark',

        'en_top_8_cities_card2_text' => 'Stays from $127+',
        'dk_top_8_cities_card2_text' => 'Ophold fra 400 kr+',

        'en_flight_search' => 'Flight Search',
        'dk_flight_search' => 'Fly søgning',

        'en_' => '',
        'dk_' => '',
    ];
?>