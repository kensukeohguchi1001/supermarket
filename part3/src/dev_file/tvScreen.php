<?php

// ◯インプット
// 入力は以下の形式で与えられます。

// テレビのチャンネル 視聴分数 テレビのチャンネル 視聴分数 ...

// ただし、同じチャンネルを複数回見た時は、それぞれ分けて記録すること。

// チャンネル：数値を指定すること。1〜12の範囲とする（1ch〜12ch）
// 視聴分数：分数を指定すること。1〜1440の範囲とする

// ◯アウトプット
// テレビの合計視聴時間
// テレビのチャンネル 視聴分数 視聴回数
// テレビのチャンネル 視聴分数 視聴回数
// ...

// ただし、閲覧したチャンネルだけ出力するものとする。

// 視聴時間：時間数を出力すること。小数点一桁までで、端数は四捨五入すること

// ◯インプット例

// 1 30 5 25 2 30 1 15

// ◯アウトプット例

// 1.7
// 1 45 2
// 2 30 1
// 5 25 1

// ◯実行コマンド例
// php quiz.php 1 30 5 25 2 30 1 15

// インプットを受け取る
// 配列を分解する[0] => [1,30], [1] => [5,25]
// array_key_existsで既にkeyがある場合はそのkeyに[分数]を格納する
// データ構造を決める [1] => [30,15] [2] => [30]
// 合計時間を算出するsumScreenTime関数を作成する
//
// チャンネル名ごとの分数と回数を表示

const SPLIT_NUMBER = 2;

function inputs(): array
{
  $documents = array_slice($_SERVER['argv'],1);
  return array_chunk($documents,SPLIT_NUMBER);
}

function separateOfChanelTime(array $inputs)
{
  $chanelTime = [];
  foreach($inputs as $input){
    $chanel = $input[0];
    $min = $input[1];
    $mins =(array) $min;
    if(array_key_exists($chanel,$chanelTime)){
      $mins = array_merge($mins,$chanelTime[$chanel]);
    }
    $chanelTime[$chanel] = $mins;
    var_dump($chanelTime);
  }
}

$inputs = inputs();
$separateOfChanelTime = separateOfChanelTime($inputs);
