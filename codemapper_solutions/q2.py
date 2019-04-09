"""Q. Write a function matched(s) that takes as input a string s and checks if the brackets "(" and ")" in s are matched: that is, every "(" has a matching ")" after it and every ")" has a matching "(" before it.  Your function should ignore all other symbols that appear in s.  Your function should return True if s has matched brackets and False if it does not."""

#solution
def matched(s):
    lst=[]
    for t in s:
        if t=="(":
            lst.append(t)
        elif t==")":
            if len(lst)!=0:
                lst.pop()
            else:
                return False
    if len(lst)==0:
        return True
    else:
        return False

"""sample testcases"""
#testcase 1
print(matched("zb%78"))
#output: True

#testcase 2
print(matched("(7)(a"))
#output: False

#testcase 3
print(matched("a)*(?"))
#output: False

"""hidden testcases"""
#testcase 1
print(matched("((jkl)78(A)&l(8(dd(FJI:),):)?)"))
#output: True

#testcase 2
print(matched("a3qw3;4w3(aasdgsd)((agadsgdsgag)agaga)"))
#output: True

#testcase 3
print(matched("(ag(Gaga(agag)Gaga)GG)a)33)cc("))
#output: False
