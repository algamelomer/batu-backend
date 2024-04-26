<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $posts = [
            [
                'id'=>1,
                'title' => 'جامعة برج العرب التكنولوجية تهنئ الأمة الإسلامية بعيد الفطر المبارك',
                'description' => 'تهنئ جامعة برج العرب التكنولوجية، برئاسة الاستاذ الدكتور محمد مرسي الجوهري، الأمة الإسلامية والسادة عمداء الكليات وأعضاء هيئة التدريس والعاملين بالجامعة ولجميع الطلاب والطالبات بمناسبة عيد الفطر المبارك، وتؤكد على أهمية التمسك بالقيم والمبادئ الإسلامية النبيلة. متمنية بأن يُعيد الله هذه المناسبة المباركة على الأمة الإسلامية بالخير واليمن والبركات. وتُؤكد الجامعة على التزامها بمواصلة رسالتها في نشر العلم والمعرفة، وإعداد جيل من الشباب القادر على مواكبة التطورات ',
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(16).jpg',
                'file_type' => 'image',
                'type' => 'news',
                'user_id' => \App\Models\User::factory(),
            ],
            [
                'id'=>2,
                'title' => 'جامعة برج العرب التكنولوجية تشارك في حفل إفطار الأسرة المصرية',
                'description' => 'برعاية كريمة وبحضور  فخامة الرئيس عبد الفتاح السيسي، رئيس جمهورية مصر العربية، شاركت جامعة برج العرب التكنولوجية، برئاسة الأستاذ الدكتور محمد مرسي الجوهري، في حفل إفطار الأسرة المصرية الذي أقيم مساء اليوم بفندق الماسة بالقاهرة. وحضر الحفل عدد من كبار المسؤولين، من بينهم وزراء الحكومة، رجال الأزهر، ونواب البرلمان والشيوخ، روؤساء الجامعات المصرية والحكومية والتكنولوجية والخاصة والاهلية، وعدد من الشخصيات العامة، والمواطنين. وقد ضم الحضور من جامعة برج العرب التكنولوجية، الأستاذ الدكتور محمد مرسي الجوهري، رئيس الجامعة، والطالب عبد الرحمن ابراهيم، رئيس اتحاد طلاب الجامعة. وقد أعرب الأستاذ الدكتور محمد مرسي الجوهري، رئيس جامعة برج العرب التكنولوجية، عن سعادته بالمشاركة في هذا الحفل الوطني الكبير، الذي يجمع شتى أطياف المجتمع المصري، مؤكداً على أهمية مثل هذه الفعاليات في تعزيز روح الترابط والتكافل بين أبناء الشعب المصري. وأضاف الجوهري أن مشاركة جامعة برج العرب التكنولوجية في حفل إفطار الأسرة المصرية تأتي في إطار حرص الجامعة على التواصل مع المجتمع، والمشاركة في مختلف الفعاليات الوطنية التي تعزز القيم والمبادئ المصرية الأصيلة. كما أشاد الجوهري برعاية فخامة الرئيس عبد الفتاح السيسي لحفل إفطار الأسرة المصرية، مؤكداً على أن ذلك يدل على حرص الرئيس على التواصل مع أبناء الشعب المصري، واهتمامه بتعزيز أواصر الترابط بينهم. ومن جانبه، أعرب الطالب عبد الرحمن ابراهيم، رئيس اتحاد طلاب جامعة برج العرب التكنولوجية، عن سعادته بالمشاركة في هذا الحفل الوطني الكبير، مؤكداً على أن ذلك يعد فرصة رائعة للطلاب للتواصل مع كبار المسؤولين، والتعرف على مختلف القضايا التي تهم المجتمع المصري.',
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(14).jpg',
                'file_type' => 'image',
                'type' => 'news',
                'user_id' => \App\Models\User::factory(),
            ],
            [
                'id'=>3,
                'title' => 'رئيس الجامعة يتفقد امتحانات منتصف العام الدراسي الثاني',
                'description' => 'قام الأستاذ الدكتور محمد مرسي الجوهري، رئيس جامعة برج العرب التكنولوجية، اليوم الأحد، بجولة تفقدية على لجان امتحانات منتصف العام الدراسي الثاني "الميدتيرم" للعام الجامعي 2023-2024، وذلك للاطمئنان على سير العملية الامتحانية وانتظامها، وتوفير كافة سبل الراحة للطلاب خلال أدائهم للامتحانات. رافق رئيس الجامعة في جولته الاستاذة الدكتورة رانيا الشرقاوي، عميد كلية تكنولوجيا العلوم الصحية والاستاذ الدكتور ابراهيم الفحام عميد كلية تكنولوجيا الصناعة والطاقة، حيث زاروا عدداً من اللجان المختلفه داخل الكليات، وتابعوا سير الامتحانات، وتأكدوا من التزام الطلاب واللجان بالتعليمات والقواعد المنظمة للامتحانات. وأكد رئيس الجامعة على أهمية امتحانات منتصف العام في تقييم مستوى الطلاب، وقياس مدى استيعابهم للمقررات الدراسية، مشيراً إلى أن الجامعة حريصة على توفير كافة الإمكانيات اللازمة لضمان سير العملية الامتحانية بشكل سلس وناجح. وأشاد رئيس الجامعة بالجهود المبذولة من قبل أعضاء هيئة التدريس والإدارة في تنظيم الامتحانات، وتوفير جو مناسب للطلاب لأداء امتحاناتهم، مشيراً إلى حرص الجامعة على توفير بيئة تعليمية آمنة وصحية للطلاب. وأشارت د.رانيا الشرقاوي عميد كلية تكنولوجيا العلوم الصحية إلى أن الجامعة اتخذت كافة الإجراءات الاحترازية اللازمة للحفاظ على صحة وسلامة الطلاب خلال أدائهم للامتحانات، والتأكد من وجود مسافات آمنة بين الطلاب في قاعات الامتحانات. وأشار د. ابراهيم الفحام عميد كلية تكنولوجيا الصناعة والطاقة، أن سير الامتحانات حتى الآن يسير بشكل منتظم وهادئ مؤكداً على أهمية امتحانات "الميدتيرم" في تقييم مستوى فهم الطلاب للمواد الدراسية. وأعرب الطلاب عن سعادتهم بتفقد رئيس الجامعة للجان الامتحانات، مؤكدين على أن ذلك يعكس حرص الجامعة على متابعة سير العملية الامتحانية والاهتمام براحة الطلاب.',
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(1).jpg',
                'file_type' => 'image',
                'type' => 'news',
                'user_id' => \App\Models\User::factory(),
            ],
            [
                'id'=>4,
                'title' => 'جامعة برج العرب التكنولوجية تنظم إفطارًا جماعيًا بمناسبة شهر رمضان',
                'description' => 'نظمت جامعة برج العرب التكنولوجية إفطارًا جماعيًا لطلاب الجامعة وأعضاء هيئة التدريس والهيئة المعاونة والإداريين بمناسبة حلول شهر رمضان المبارك. وقد حضر الإفطار الاستاذ الدكتور محمد مرسي الجوهري، رئيس الجامعة، والسادة عمداء الكليات، وعدد كبير من أعضاء هيئة التدريس والعاملين بالجامعة. وفي كلمة الأستاذ الدكتور محمد مرسي الجوهري، رئيس الجامعة، بهذه المناسبة، أكد على أهمية شهر رمضان المبارك كشهر للعبادة والتقرب من الله تعالى، كما أكد على أهمية التكافل الاجتماعي بين جميع أفراد المجتمع. وأضاف رئيس الجامعة: "إن هذا الإفطار الجماعي هو تعبير عن روح التعاون والتكافل بين جميع أفراد الأسرة الجامعية، كما أنه فرصة للتواصل بين الطلاب وأعضاء هيئة التدريس والعاملين بالجامعة." وتابع: "إننا في جامعة برج العرب التكنولوجية نحرص على تنظيم مثل هذه الفعاليات التي تعزز روح التعاون والتواصل بين جميع أفراد الأسرة الجامعية، كما نحرص على غرس القيم الإسلامية النبيلة في نفوس الطلاب." واختتم رئيس الجامعة كلمته بتقديم التهنئة للجميع بمناسبة حلول شهر رمضان المبارك، داعيًا الله تعالى أن يتقبل من الجميع صالح الأعمال وأن يعيد هذه المناسبة على الجميع بالخير واليمن والبركات. كما وجه رئيس الجامعة الشكر لإدارة رعاية شباب الجامعة وإدارة العلاقات العامة واتحاد طلاب الجامعة ولكل من شارك في تنظيم هذا اليوم. وقد تضمن الإفطار العديد من الفقرات الترفيهية والروحية، حيث تم تلاوة آيات من القرآن الكريم، كما تم تقديم بعض الأناشيد الدينية والفقرات الترفيهية والاسئلة توزيع الجوائز. وقد أعرب جميع الحاضرين عن سعادتهم بتنظيم هذا الإفطار الجماعي، كما أكدوا على أهمية مثل هذه الفعاليات في تعزيز روح التعاون والتواصل بين جميع أفراد الأسرة الجامعية.',
                'file' => 'https://linkdhub.github.io/batu-images/images/image%20(15).jpg',
                'file_type' => 'image',
                'type' => 'news',
                'user_id' => \App\Models\User::factory(),
            ]
        ];

        static $index = 0;
        $post = $posts[$index];
        $index = ($index + 1) % count($posts);

        $userIds = \App\Models\User::pluck('id')->toArray();

        return [
            'title' => $post['title'],
            'description' => $post['description'],
            'type' => $post['type'],
            'user_id' => $this->faker->randomElement($userIds),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * Indicate that the post should have a file.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withFile()
    {
        return $this->afterCreating(function (Post $post) {
            if ($post->postFiles()->doesntExist()) {
                $post->postFiles()->create([
                    'file' => $post['file'],
                    'file_type' => $post['file_type'],
                ]);
            }
        });
    }

}
