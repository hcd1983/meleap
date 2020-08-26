
<form id="contact-form" class="contact-form" @submit.prevent="FormSubmit('{{route("FormSubmit")}}')">

    <div class="form-group required">
        <label>お名前</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group required">
        <label>メールアドレス</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group required">
        <label>会社名</label>
        <input type="text" class="form-control" name="company" required>
    </div>
    <div class="form-group required">
        <label>電話番号</label>
        <input type="text" class="form-control" name="tel" required>
    </div>
    <div class="form-group required">
        <label>HADOのご検討状況をお聞かせください </label><br>
        <template v-for="option,index in ['HADOの導入を検討している','HADOを含め情報収集している段階である']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'usehado' + index" :value="option" name="usehado">
                <label class="form-check-label" :for="'usehado' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>希望するプランをお聞かせください</label><br>
        <template v-for="option,index in ['HADOを常設コンテンツとして利用したい','HADOをイベントで利用したい（商業施設、地域活性化、テーマパークなど）','HADO法人向けプログラム（社員旅行、懇親会、社員研修、社員総会、周年イベントなど）で利用したい']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'plan' + index" :value="option" name="plan">
                <label class="form-check-label" :for="'plan' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>HADOの導入希望エリアをお聞かせください(複数回答可)</label><br>
        <template
            v-for="option,index in
                        ['北海道',
                        '東北エリア（青森県、岩手県、秋田県、宮城県、山形県、福島県）',
                        '関東エリア（茨城県、栃木県、群馬県、埼玉県、千葉県、東京都、神奈川県）',
                        '中部エリア（新潟県、富山県、石川県、福井県、山梨県、長野県、岐阜県、静岡県、愛知県）',
                        '近畿エリア（三重県、滋賀県、奈良県、和歌山県、京都府、大阪府、兵庫県）',
                        '中国エリア（岡山県、広島県、鳥取県、島根県、山口県）',
                        '四国エリア（香川県、徳島県、愛媛県、高知県）',
                        '九州エリア（福岡県、佐賀県、長崎県、大分県、熊本県、宮崎県、鹿児島県、沖縄県）',
                        'その他'
                        ]">
            <div class="form-check">
                <input  type="checkbox" :id="'form-place'+index" :value="option" class="form-check-input" name="formplace">
                <label :for="'form-place'+index" class="form-check-label">@{{option}}</label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>詳細な導入場所についてお知らせください</label>
        <textarea class="form-control" required name="placedetail"></textarea>
    </div>

    <div class="form-group required">
        <label>ご希望のコンテンツをお知らせください </label><br>
        <template v-for="option,index in
                    ['HADO',
                    'HADO MONSTER BATTLE',
                    'HADO SHOOT',
                    'HADO KART']">
            <div class="form-check d-block d-lg-inline-block mr-lg-4">
                <input class="form-check-input" type="radio" :id="'hadotype' + index" :value="option"  name="hadotype">
                <label class="form-check-label" :for="'hadotype' + index">
                    @{{option}}
                </label>
            </div>
        </template>
    </div>

    <div class="form-group required">
        <label>ご予算イメージをお聞かせください</label>
        <select  class="form-control" style="max-width: 270px;" name="budget">
            <option v-for="option,index in [
                        '特に決まってない・不明',
                        '〜50万円程度',
                        '〜100万円程度',
                        '〜300万円程度',
                        '〜500万円程度',
                        '〜1000万円程度',
                        '〜2000万円程度',
                        '〜それ以上',
                    ]">@{{option}}</option>
        </select>
    </div>

    <div class="form-group">
        <label>HADOをどこで知りましたか？</label><br>
        <template
            v-for="option,index in
                        ['Facebook',
                        'Web',
                        '知り合いからの紹介',
                        '催事・EXPO',
                        'TV',
                        '雑誌',
                        '新聞',
                        'Twitter',
                        'その他'
                        ]">
            <div class="form-check form-check-inline">
                <input  type="checkbox" :id="'form-know'+index"  :value="option" class="form-check-input" name="whereknow">
                <label :for="'form-know'+index" class="form-check-label">@{{option}}</label>
            </div>
        </template>
    </div>

    <div class="form-group">
        <label>その他ご要望があれば、お聞かせください</label>
        <textarea class="form-control"  style="min-height: 100px;" name="other"></textarea>
    </div>


    <h4>＜お問い合わせへのご回答について＞</h4>
    <ul>
        <li>営業担当、または担当代理店(スタンバイ株式会社)よりメールまたはお電話にて回答させていただきます。</li>
        <li>土日、祝日前後、年末年始ほか、弊社休業日に頂いたご連絡については、翌営業日以降の回答となりますのでご了承下さい。</li>
    </ul>

    <div>
        <button class="btn btn-submit" type="submit">送信內容確認 <i class="fas fa-chevron-right"></i></button>
    </div>

</form>
