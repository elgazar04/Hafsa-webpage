<?php
class Library {
    public function __construct() {
        echo "Welcome to our website!\n";
    }
   public function promptUser() {
        echo "What would you like to do?\n";
        echo "1. View the Hijri calendar\n";
        echo "2. Listen to a sheikh\n";
        echo "3. Learn about  Asmaa Allah al-Husna\n";
        echo "4. View prayer times\n";
        echo "5. Learn about the Shahada\n";
        echo "6. Learn about Hajj and Umrah\n";
        echo "7. Get a daily Hadith\n";
        echo "8. Quran Tafsir\n";
        echo "9. Donate\n";
        echo "10. Recommend Islamic videos\n";
        echo "11. Popular verses from random surahs\n";
        echo "12. Reserve a ticket\n";
  echo "13. Islamic Greetings\n"; // New option
        echo "14. View Islamic Books\n"; // New option
        $choice = readline("Enter the number of your choice: ");
        return $choice;
    }

    public function handleChoice($choice) {
        switch ($choice) {
            case 1:
                $this->hijri_Calendar();
                break;
            case 2:
                $this->set_sheikh();
                break;
            case 3:
                $this->asmaa_husnaa();
                break;
            case 4:
                $this->view_prayer_times();
                break;
            case 5:
                $this->shahada();
                break;
            case 6:
                $this->hajj_Umrah_Info();
                break;
            case 7:
                $this->daily_Hadith();
                break;
            case 8:
                $this->quran_Tafsir();
                break;
            case 9:
                $this->ask_donation();
                break;
            case 10:
                $this->recommend_Videos();
                break;
            case 11:
                $this->popular_Verses();
                break;
            case 12:
                $this->reserve_ticket();
                break;
      case 13:
                $this->islamic_greetings();
                break;
      case 14:
                $this->view_islamic_books();
                break;

            default:
                echo "Invalid choice. Please try again.\n";
                break;
        }
    }

    public function hijri_calendar() {
    echo "Hijri calendar is not implemented yet.\n";
}

   public function set_sheikh() {
        $sheikhs = array(
            1 => "Sheikh Abdullah",
            2 => "Sheikh Ahmed",
            3 => "Sheikh Ali",
        );

        echo "Choose a sheikh:\n";
        foreach ($sheikhs as $index => $sheikh) {
            echo "$index. $sheikh\n";
        }

        $sheikhChoice = readline("Enter the number of your chosen sheikh: ");

        if (!array_key_exists($sheikhChoice, $sheikhs)) {
            echo "Invalid choice. Please select a valid number for the sheikh.\n";
            exit;
        }

        $selectedSheikh = $sheikhs[$sheikhChoice];
        list($selectedSurah, $youtubeLink) = $this->setSoura($selectedSheikh);
        echo "You selected: $selectedSurah from $selectedSheikh\n";
        echo "Listen to it on YouTube: $youtubeLink\n";
    }

    public function setSoura($sheikh) {
        $surahs = array(
            "Al-Fatiha" => "https://www.youtube.com/watch?v=vPkquM8I9Bw",
            "Al-Baqarah" => "https://www.youtube.com/watch?v=hRG0NvySCTs",
            "Al-'Imran" => "https://www.youtube.com/watch?v=wziZhE2pKAw",
        );

        echo "Choose a surah from $sheikh:\n";
        foreach ($surahs as $surah => $youtubeLink) {
            echo "$surah\n";
        }

        $surahChoice = readline("Enter the name of your chosen surah: ");

        if (!array_key_exists($surahChoice, $surahs)) {
            echo "Invalid choice. Please select a valid surah.\n";
            exit;
        }
        $selectedSurah = $surahChoice;
        $youtubeLink = $surahs[$surahChoice];
        return array($selectedSurah, $youtubeLink);
    }
    public function asmaa_husnaa() {
    $names_of_allah = array(
        "Ar-Rahman", "Ar-Rahim", "Al-Malik", "Al-Quddus", "As-Salam",
        "Al-Mu'min", "Al-Muhaymin", "Al-Aziz", "Al-Jabbar", "Al-Mutakabbir",
        "Al-Khaliq", "Al-Bari", "Al-Musawwir", "Al-Ghaffar", "Al-Qahhar",
        "Al-Wahhab", "Ar-Razzaq", "Al-Fattah", "Al-Alim", "Al-Qabid",
        "Al-Basit", "Al-Khafid", "Ar-Rafi", "Al-Mu'izz", "Al-Muzil",
        "Al-Sami", "Al-Basir", "Al-Hakam", "Al-Adl", "Al-Latif",
        "Al-Khabir", "Al-Halim", "Al-Azim", "Al-Ghafur", "Ash-Shakur",
        "Al-Ali", "Al-Kabir", "Al-Hafiz", "Al-Muqit", "Al-Hasib",
        "Al-Jalil", "Al-Karim", "Ar-Raqib", "Al-Mujib", "Al-Wasi",
        "Al-Hakim", "Al-Wadud", "Al-Majid", "Al-Ba'ith", "Ash-Shahid",
        "Al-Haqq", "Al-Wakil", "Al-Qawi", "Al-Matin", "Al-Wali",
        "Al-Hamid", "Al-Muhsi", "Al-Mubdi", "Al-Mu'id", "Al-Muhyi",
        "Al-Mumit", "Al-Hayy", "Al-Qayyum", "Al-Wajid", "Al-Majid",
        "Al-Wahid", "Al-Ahad", "As-Samad", "Al-Qadir", "Al-Muqtadir",
        "Al-Muqaddim", "Al-Mu'akhkhir", "Al-Awwal", "Al-Akhir", "Az-Zahir",
        "Al-Batin", "Al-Wali", "Al-Muta'ali", "Al-Barr", "At-Tawwab",
        "Al-Muntaqim", "Al-Afuww", "Ar-Ra'uf", "Malik Al-Mulk", "Dhul-Jalali Wal-Ikram",
        "Al-Muqsit", "Al-Jami", "Al-Ghani", "Al-Mughni", "Al-Mani",
        "Ad-Darr", "An-Nafi", "An-Nur", "Al-Hadi", "Al-Badi"
    );
    echo "Asmaa Allah al-Husna (The 99 Names of Allah):\n";
    foreach ($names_of_allah as $index => $name) {
        echo ($index + 1) . ". $name\n";
    }
}
    public function shahada() {

    echo "The Shahada (Declaration of Faith):\n";
    echo "La ilaha illallah, Muhammadur Rasulullah.\n";
    echo "(There is no god but Allah, Muhammad is the Messenger of Allah.)\n";
}

    public function hajj_umrah_info() {
  
    echo "Hajj and Umrah are two sacred pilgrimages in Islam.\n";
    echo "Hajj is the pilgrimage to Mecca that is obligatory for every Muslim who is physically and financially able to perform it.\n";
    echo "Umrah is a pilgrimage to Mecca that can be undertaken at any time of the year.\n";
    echo "It is not obligatory but highly recommended.\n";
}
    public function daily_hadith() {
    $hadiths = array(
        "The best among you are those who have the best manners and character. - Prophet Muhammad (peace be upon him)",
        "Do not be people without minds of your own, saying that if others treat you well you will treat them well, and that if they do wrong you will do wrong. Instead, accustom yourselves to do good if people do good and not to do wrong if they do evil. - Prophet Muhammad (peace be upon him)",
        "The strong man is not the one who can overpower others. Rather, the strong man is the one who controls himself when he gets angry. - Prophet Muhammad (peace be upon him)",
    );

    $random_hadith = $hadiths[array_rand($hadiths)];

    echo "Daily Hadith:\n";
    echo "$random_hadith\n";
}
    public function view_prayer_times() {
    echo "RABY YWFA'K.\n";
    echo "Fajr(4:30AM) Duhr(12:52PM) Asr(4:28PM) Maghrib(7:37PM) Isha(9:03).\n";

}

    public function quran_tafsir() {
   
    $tafsir = array(
        "2:255" => "Ayat al-Kursi is a well-known verse from the Quran which highlights the greatness and power of Allah. It emphasizes His sovereignty over the heavens and the earth.",
        "3:18" => "This verse speaks about the uniqueness of Islam and how Allah does not accept any other religion except Islam as a way of life.",
        "4:34" => "This verse addresses the issue of marital disputes and outlines the steps to be taken in case of disobedience or conflict within the marriage, emphasizing the importance of resolving conflicts with wisdom and kindness.",
    );
    
    echo "Select a Quranic verse to get its explanation:\n";
    foreach ($tafsir as $verse => $explanation) {
        echo "$verse\n";
    }
    $selected_verse = readline("Enter the verse reference (e.g., 2:255): ");

    if (!array_key_exists($selected_verse, $tafsir)) {
        echo "Invalid verse reference. Please enter a valid reference.\n";
        exit;
    }

    echo "Explanation of $selected_verse:\n";
    echo $tafsir[$selected_verse] . "\n";
}

    public function ask_donation() {
    $donate_choice = readline("Would you like to donate? (yes/no): ");
    if (strtolower($donate_choice) === 'yes') {
        echo "Gazak Allah Ghayran!\n";
        echo "Please visit our donation page: https://www.myf-egypt.org/donation/\n";  } 
    else {
        echo "Thank you for considering!\n";
    }
}
    public function recommend_videos() {
    $availability = readline("Are you free to watch Islamic videos now? (yes/no): ");

    if (strtolower($availability) === 'yes') {
        echo "Here are some Islamic videos you may find beneficial:\n";
        echo "1. The Life of Prophet Muhammad (saw)\n";
        echo "2. Understanding the Quran: Tafsir of Surah Al-Fatiha\n";
        echo "3. Inspirational Stories from the Lives of the Sahaba\n";
    } else {
        echo "No problem! Feel free to watch the videos whenever you have time.\n";
    }
}
    public function popular_verses() {
    $popular_verses = array(
        "2:255" => "Ayat al-Kursi is a well-known verse from the Quran which highlights the greatness and power of Allah. It emphasizes His sovereignty over the heavens and the earth.",
        "3:18" => "This verse speaks about the uniqueness of Islam and how Allah does not accept any other religion except Islam as a way of life.",
        "4:34" => "This verse addresses the issue of marital disputes and outlines the steps to be taken in case of disobedience or conflict within the marriage, emphasizing the importance of resolving conflicts with wisdom and kindness.",
    );

    $random_verse = array_rand($popular_verses);
    echo "Random Popular Verse from the Quran:\n";
    echo "Verse: $random_verse\n";
    echo "Explanation: " . $popular_verses[$random_verse] . "\n";
}


    public function reserve_ticket() {
    $reserve_choice = readline("Would you like to reserve a ticket to Saudi Aribia? (yes/no): ");
    if (strtolower($reserve_choice) === 'yes') {
        echo "Umrah/Haj maqboul ya rab!\n";
        echo "Go ahead to: https://www.egyptair.com/ar/Pages/HomePage.aspx/\n";  } 
    else {
        echo "Thank you for considering!\n";
    }
    }
    public function islamic_greetings() {
        $greetings = array(
            "Assalamu Alaikum Warahmatullahi Wabarakatuh (May the peace, mercy, and blessings of Allah be with you)",
            "JazakAllahu Khayran (May Allah reward you with goodness)",
            "SubhanAllah (Glory be to Allah)",
            "Alhamdulillah (All praise is due to Allah)",
            "Allahu Akbar (Allah is the Greatest)",
            "Masha'Allah (What Allah has willed)",
            "Insha'Allah (God willing)",
            "Astaghfirullah (I seek forgiveness from Allah)",
            "BarakAllahu Feek (May Allah bless you)",
            "La ilaha illallah (There is no god but Allah)",
        );

        echo "Islamic Greetings:\n";
        foreach ($greetings as $greeting) {
            echo "$greeting\n";
        }
    }
    public function view_islamic_books() {
        $books = array(
            "The Holy Quran",
            "Sahih al-Bukhari",
            "Sahih Muslim",
            "Riyad as-Salihin",
            "Tafsir ibn Kathir",
            "Fiqh as-Sunnah",
            "The Sealed Nectar (Ar-Raheeq Al-Makhtum)",
            "The Biography of the Prophet (Seerah)",
            "The Fundamentals of Tawheed",
            "The Gardens of the Righteous (Riyadh al-Salihin)",
        );

        echo "Here is some Islamic Books for you:\n";
        foreach ($books as $index => $book) {
            echo ($index + 1) . ". $book\n";
        }
    }
}
$islamicWebsite = new IslamicWebsite();
$userChoice = $islamicWebsite->promptUser();
$islamicWebsite->handleChoice($userChoice);
?>