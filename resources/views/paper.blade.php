<h1>Question Paper</h1>
<?php
$i=1;
?>
@foreach ($total as $section)

    @foreach ($section as $question)
        <?php
        $k=(string)$i;
        if($question->type!="mcq"){
            ?>
        <p><b><font size="4">{{$k.".".$question->question.":"."Marks (".$question->marks." )"}}</font></b></p>
        <?php
        }else{
            $q=0;
            $w=1;
            $e=2;
            $r=3;
            $h=rand();
            $result = fmod($h,2);
            if($result==1){
                $q=1;
                $w=0;
            }
            $answers=explode("#",$question->answer);
            ?>
        <p><b><font size="4">{{$k.".".$question->question.":"."Marks (".$question->marks." )"}}</font></b></p>
        <p>{{"a.".$answers[$e]}}</p>
        <p>{{"b.".$answers[$w]}}</p>
        <p>{{"c.".$answers[$q]}}</p>
        <p>{{"d.".$answers[$r]}}</p>

        <?php
        }



        $i=$i+1;
        ?>


    @endforeach


@endforeach