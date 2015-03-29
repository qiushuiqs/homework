## 假象场景 ##

我们正在招募几位优秀的PHP工程师，为了帮我们找到最棒的工作伙伴，我们决定让这些候选人参加一个“拳击”游戏。每个候选人必须和其他候选人完成过一次对战，最后胜率最高的候选人，就是游戏的最终获胜者！

规则说明:

每一场两个选手的对战可能由一个或多个回合，直至其中一个选手的健康指数<=0后，比赛终止。
每一回合，每个选手相互交替攻击对方，直至两个选手都用光各自所允许的最大攻击次数，或者其中一个选手的健康指数<=0为止。
在每个回合中，双方随机先开始攻击。如果你嫌麻烦，也可以直接读取附件中的每个人的Initiative(优先指数)。
要求:

候选人的各个属性数据必须从提供的excel附件(applicants.csv)里面读取。每个候选人必须和所有其他候选人完成一一对战，最后胜率最高的候选人，就是游戏的最终获胜者！

尽量保持程序输出结果清楚可读且简洁。建议参考上面的示例的英文输出格式，可作适当的微调。切记不要直接输出任何中文字符！

程序设计方面，你可以自由发挥，但必须是符合面向对象编程方法。通过此测试，让我们进一步了解你的解决问题的能力和创造力及编码风格。

本次编程挑战的时间时限3小时，如果为完成编程设计确实需要申请额外时间，请在3小时后，回复邮件申请，额外追加时间不得超过1小时。额外时间，也将纳入综合考评因素。

请把你完成的程序代码上传到自己的github上。（为了提高自身能力，请不要在Hackathon结束前参考他人代码）

示例比赛:

Candidate 1:

    Health: 46
    Damage: 3
    Attacks: 5

Candidate 2:

    Health: 52
    Damage: 8
    Attacks: 2

Round 1:

    Candidate 1 is randomly selected to go first (43 > 40)  <-- initiative roll
    Candidate 1 hits candidate 2 for 3 damage (52 -> 49)    <-- Damage applied (health before damage -> health after damage)
    Candidate 2 hits candidate 1 for 8 damage (46 -> 38)
    Candidate 1 hits candidate 2 for 3 damage (49 -> 46)
    Candidate 2 hits candidate 1 for 8 damage (38 -> 30)
    Candidate 1 hits candidate 2 for 3 damage (46 -> 43)
    Candidate 1 hits candidate 2 for 3 damage (43 -> 40)
    Candidate 1 hits candidate 2 for 3 damage (40 -> 37)

Round 2:

    Candidate 1 is randomly selected to go first (26 > 11)
    Candidate 1 hits candidate 2 for 3 damage (37 -> 34)
    Candidate 2 hits candidate 1 for 8 damage (30 -> 22)
    Candidate 1 hits candidate 2 for 3 damage (34 -> 31)
    Candidate 2 hits candidate 1 for 8 damage (22 -> 14)
    Candidate 1 hits candidate 2 for 3 damage (31 -> 28)
    Candidate 1 hits candidate 2 for 3 damage (28 -> 25)
    Candidate 1 hits candidate 2 for 3 damage (25 -> 22)

Round 3:

    Candidate 2 is randomly selected to go first (35 > 29)
    Candidate 2 hits candidate 1 for 8 damage (14 -> 6)
    Candidate 1 hits candidate 2 for 3 damage (22 -> 19)
    Candidate 2 hits candidate 1 for 8 damage (6 -> -2)
    Candidate 2 wins!
属性说明:

Name        - 候选人姓名
Health      - 初始健康指数
Damage      - 每一拳的伤害值
Attacks     - 每回合允许的最大攻击次数
附件里面还包含一些附加属性，仅限时间允许的情况下考虑，作为额外加分项，不作硬性要求：

Dodge       - 闪避成功概率
Critical    - 给对方造成加倍伤害概率
Initiative  - 优先攻击指数