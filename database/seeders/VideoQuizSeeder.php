<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question1 = [
            [
                'question_text' => "What happens when the IP phone's Do Not Disturb (DND) feature is activated?",
                'options' => [
                    'A' => 'The phone rings louder',
                    'B' => 'Incoming calls are temporarily blocked and may go to voicemail',
                    'C' => 'Calls are automatically recorded',
                    'D' => 'The phone shuts down',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'How can you enable the DND feature on the IP phone?',
                'options' => [
                    'A' => 'Dial *30',
                    'B' => 'Restart the phone',
                    'C' => 'Press the DND button or dial *32',
                    'D' => 'Put the phone on mute',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'What is the correct method to disable the DND feature?',
                'options' => [
                    'A' => 'Press DND or dial *32',
                    'B' => 'Press the minus DND button or dial *30',
                    'C' => 'Call IT support',
                    'D' => 'Dial *99',
                ],
                'correct_option_key' => 'B',
            ],
        ];

        $questions2 = [
            [
                'question_text' => 'Why is cybersecurity important in educational institutions?',
                'options' => [
                    'A' => 'Because students forget passwords',
                    'B' => 'Because universities are major targets with sensitive data',
                    'C' => 'Because it improves internet speed',
                    'D' => 'Because it reduces electricity use',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'What is the first step to preventing cybersecurity threats?',
                'options' => [
                    'A' => 'Memorizing every IT policy',
                    'B' => 'Awareness of common threats',
                    'C' => 'Using only personal devices',
                    'D' => 'Ignoring suspicious emails',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'Which of the following is an example of a phishing attempt?',
                'options' => [
                    'A' => 'IT notice about scheduled maintenance',
                    'B' => 'Email asking you to update your password with the subject “Your account will expire soon',
                    'C' => 'Calendar reminder',
                    'D' => 'Class schedule notification',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'What should you always check before clicking a link in an email?',
                'options' => [
                    'A' => 'Whether the email has emojis',
                    'B' => "The sender's address and the actual link destination",
                    'C' => 'The font size',
                    'D' => 'The background color',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'Which of the following is a safe data-handling practice?',
                'options' => [
                    'A' => 'Storing grades on personal cloud drives',
                    'B' => 'Sending student data through personal email',
                    'C' => 'Using official email and approved storage platforms',
                    'D' => 'Keeping old files forever',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'Why should you use strong, unique passwords?',
                'options' => [
                    'A' => 'To avoid forgetting your password',
                    'B' => 'To make the login slower',
                    'C' => 'To prevent hackers from accessing your accounts',
                    'D' => 'To easily share your password with colleagues',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'What is the purpose of two-factor authentication (2FA)?',
                'options' => [
                    'A' => 'To allow login without a password',
                    'B' => 'To add an extra layer of protection',
                    'C' => 'To make devices run faster',
                    'D' => 'To share access with others',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'What should you avoid when using public Wi-Fi?',
                'options' => [
                    'A' => 'Watching videos',
                    'B' => 'Downloading apps',
                    'C' => 'Performing sensitive activities',
                    'D' => 'Browsing social media',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'If you suspect a security incident, what is the correct first step?',
                'options' => [
                    'A' => 'Try to fix the issue yourself',
                    'B' => 'Disconnect from the internet and report it to IT',
                    'C' => 'Restart the device',
                    'D' => 'Delete random files',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'How quickly should you report a security issue according to policy?',
                'options' => [
                    'A' => 'Within 24 hours',
                    'B' => 'Within one hour',
                    'C' => 'By the end of the day',
                    'D' => 'Only if it becomes serious',
                ],
                'correct_option_key' => 'B',
            ],
        ];

        $questions3 = [
            [
                'question_text' => 'What is the primary purpose of the PC Account?',
                'options' => [
                    'A' => 'Accessing email',
                    'B' => 'Logging in to office, classroom, and lab computers',
                    'C' => 'Using the Wi-Fi',
                    'D' => 'Printing documents',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'How often does the PC Account password expire?',
                'options' => [
                    'A' => 'Every month',
                    'B' => 'Every 6 months',
                    'C' => 'Every 3 months',
                    'D' => 'It never expires',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'If your account is locked due to incorrect attempts, what should you do?',
                'options' => [
                    'A' => 'Wait 24 hours',
                    'B' => 'Reset the password online',
                    'C' => 'Restart the computer',
                    'D' => 'Call the IT Helpdesk at extension 104',
                ],
                'correct_option_key' => 'D',
            ],
            [
                'question_text' => 'Which domain must be used when logging into your official Gmail account?',
                'options' => [
                    'A' => '@gmail.com',
                    'B' => '@inaya.sa',
                    'C' => '@inaya.edu.sa',
                    'D' => '@imc.edu',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => ' Why should you enable Two-Step Verification?',
                'options' => [
                    'A' => 'To speed up login',
                    'B' => 'For added security and protection of your email',
                    'C' => 'To save storage',
                    'D' => 'To enable offline access',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'Where do you go to enable 2-Step Verification?',
                'options' => [
                    'A' => 'Internet settings',
                    'B' => 'Computer control panel',
                    'C' => 'Google Account → Security & Sign-in',
                    'D' => 'Google Maps',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'What does the MyQ system help you manage?',
                'options' => [
                    'A' => 'Internet usage',
                    'B' => 'Course registration',
                    'C' => 'Printing credits and print jobs',
                    'D' => 'Email attachments',
                ],
                'correct_option_key' => 'C',
            ],
            [
                'question_text' => 'What must a user have before they can print?',
                'options' => [
                    'A' => 'A Gmail account',
                    'B' => 'Enough print credit',
                    'C' => 'A USB device',
                    'D' => 'A personal laptop',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'Where should you go to add more print credit?',
                'options' => [
                    'A' => 'IT Department',
                    'B' => 'Finance Department',
                    'C' => 'Library',
                    'D' => 'Security office',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'Office 365 applications work only when you are connected to:',
                'options' => [
                    'A' => 'Bluetooth',
                    'B' => 'The internet',
                    'C' => 'The printer',
                    'D' => 'VPN',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'Who provides the login credentials for Office 365?',
                'options' => [
                    'A' => 'Google',
                    'B' => 'Admissions Department',
                    'C' => 'Finance Department',
                    'D' => 'IT Department',
                ],
                'correct_option_key' => 'D',
            ],
            [
                'question_text' => 'Where do you go to access Office 365?',
                'options' => [
                    'A' => 'yahoo.com',
                    'B' => 'office.com',
                    'C' => 'mysheets.net',
                    'D' => 'outlook.edu',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'What is Medgate used for?',
                'options' => [
                    'A' => 'Managing academic activities',
                    'B' => 'Checking Wi-Fi speed',
                    'C' => 'Printing documents',
                    'D' => 'Sending SMS alerts',
                ],
                'correct_option_key' => 'A',
            ],
            [
                'question_text' => 'Who provides the login credentials for Medgate?',
                'options' => [
                    'A' => 'IT Department',
                    'B' => 'Directorate of Admission and Registration',
                    'C' => 'Finance Department',
                    'D' => 'Security Department',
                ],
                'correct_option_key' => 'B',
            ],
            [
                'question_text' => 'How can you access the Medgate system?',
                'options' => [
                    'A' => 'Through a mobile app only',
                    'B' => 'By calling IT Helpdesk',
                    'C' => 'By opening the provided Medgate URL in a browser',
                    'D' => 'By logging into Gmail',
                ],
                'correct_option_key' => 'C',
            ],
        ];

        // 1. Create a Quiz
        $quiz1 = Quiz::create([
            'questions' => $question1,
        ]);

        // 2. Create a Video linked to the Quiz
        Video::create([
            'title' => 'IP Phone',
            'vimeo_id' => '1146294870',
            'quiz_id' => $quiz1->id,
            'duration' => "00:57",
        ]);

        // ############

        // // 1. Create a Quiz
        $quiz2 = Quiz::create([
            'questions' => $questions2,
        ]);

        // 2. Create a Video linked to the Quiz
        Video::create([
            'title' => 'Cybersecurity',
            'vimeo_id' => '1146294824',
            'quiz_id' => $quiz2->id,
            'duration' => "04:10",
        ]);

        // #################################################################
        // 1. Create a Quiz
        $quiz3 = Quiz::create([
            'questions' => $questions3,
        ]);

        // 2. Create a Video linked to the Quiz
        Video::create([
            'title' => 'Final',
            'vimeo_id' => '1146294889',
            'quiz_id' => $quiz3->id,
            'duration' => "06:33",
        ]);
    }
}
