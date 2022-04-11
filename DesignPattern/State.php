<?php
/**
 * 状态模式
 * 对有状态的对象，把复杂的“判断逻辑”提取到不同的状态对象中，允许状态对象在其内部状态发生改变时改变其行为。
 * 目的：绑定状态和行为
 */
class Member
{
    private $state;
    private $score;

    public function SetState($state)
    {
        $this->state = $state;
    }

    public function SetScore($score)
    {
        $this->score = $score;
    }

    public function GetScore()
    {
        return $this->score;
    }

    public function discount()
    {
        return $this->state->discount($this);
    }
}

interface State
{
    public function discount($member);
}

class PlatinumMemeberState implements State
{
    public function discount($member)
    {
        if ($member->GetScore() >= 1000) {
            return 0.80;
        } else {
            $member->SetState(new GoldMemberState());
            return $member->discount();
        }
    }
}

class GoldMemberState implements State
{
    public function discount($member)
    {
        if ($member->GetScore() >= 800) {
            return 0.85;
        } else {
            $member->SetState(new SilverMemberState());
            return $member->discount();
        }
    }
}

class SilverMemberState implements State
{
    public function discount($member)
    {
        if ($member->GetScore() >= 500) {
            return 0.90;
        } else {
            $member->SetState(new GeneralMemberState());
            return $member->discount();
        }
    }
}

class GeneralMemberState implements State
{
    public function discount($member)
    {
        return 0.95;
    }
}

$m = new Member();
$m->SetState(new PlatinumMemeberState());

$m->SetScore(1200);
echo '当前会员' . $m->GetScore() . '积分，折扣为：' . $m->discount(), PHP_EOL;

$m->SetScore(990);
echo '当前会员' . $m->GetScore() . '积分，折扣为：' . $m->discount(), PHP_EOL;

$m->SetScore(660);
echo '当前会员' . $m->GetScore() . '积分，折扣为：' . $m->discount(), PHP_EOL;

$m->SetScore(10);
echo '当前会员' . $m->GetScore() . '积分，折扣为：' . $m->discount(), PHP_EOL;