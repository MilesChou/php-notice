<?php

namespace Benchmarks\HashAlg;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * Benchmark string
 */
class Sha384Bench
{
    /**
     * @Revs(10000)
     * @Iterations(5)
     */
    public function benchHelloWorld()
    {
        $hash = hash('sha384', 'helloworld');
    }

    /**
     * @Revs(10000)
     * @Iterations(5)
     */
    public function benchLongString()
    {
        $hash = hash('sha384', '說到Benchmark，你會想到什麼呢？問題的關鍵究竟為何？領悟其中的道理也不是那麼的困難。話雖如此，不要先入為主覺得Benchmark很複雜，實際上，Benchmark可能比你想的還要更複雜。培根深信，深窺自己的心，而後發覺一切的奇蹟在你自己。我希望諸位也能好好地體會這句話。Benchmark絕對是史無前例的。梭洛曾說過一句意義深遠的話，一個人若不會運用別人更好的方法來保持自己的熱情，怎麼能成為哲學家？ 這把視野帶到了全新的高度。我們都有個共識，若問題很困難，那就勢必不好解決。既然如此，世界需要改革，需要對Benchmark有新的認知。Benchmark，發生了會如何，不發生又會如何。既然，如果別人做得到，那我也可以做到。克勞德蘭納新曾提出，貪婪者總是一貧如洗。這段話非常有意思。休謨曾講過，惡意是一種無緣無故產生的傷害他人的慾望，目的是從比較中獲得快樂。這激勵了我。伊森伯格說過一句經典的名言，人生的小小不幸，可以幫助我們度過重大的不幸。這段話看似複雜，其中的邏輯思路卻清晰可見。儘管Benchmark看似不顯眼，卻佔據了我的腦海。叔本華曾經提到過，意志是一個強壯的盲人，倚靠在明眼的跛子肩上。希望各位能用心體會這段話。馬克思曾說過，時間是人類發展的空間。這句話讓我們得到了一個全新的觀點去思考這個問題。');
    }
}