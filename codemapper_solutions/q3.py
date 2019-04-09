""" # QUESTION: A list of integers is said to be a valley if it consists of a sequence of strictly decreasing values followed by a sequence of strictly increasing values. The decreasing and increasing sequences must be of length at least 2. The last value of the decreasing sequence is the first value of the increasing sequence.

Write a Python function valley(l) that takes a list of integers and returns True if l is a valley and False otherwise.

"""
# solution
def valley(l):
    n = len(l)
    if n<3:
        return False
    else:
        InnerCount = 0
        OuterCount = 0
        for i in range(n-1):
            if l[i]>l[i+1]:
                InnerCount += 1
            else:
                break
        for i in range(InnerCount,n-1):
            if l[i]<l[i+1]:
                OuterCount += 1
            elif l[i]==l[i+1]:
              	return False
            else:
              	return False
                #OuterCount -=1
                #break
        if (InnerCount >=1 and OuterCount >=1):
            return True
        else:
            return False


""" Sample Test Cases """
# testcase 1
print(valley([3,2,1,2,3]))
# output = True

# testcase 2
print(valley([3,2,1]))
# output = False

# testcase 3
print(valley([3,3,2,1,2]))
# output = False

""" Hidden Testcases """
# testcase 1
print(valley([2]))
# output = False

# testcase 2
print(valley([5,4,3,2,1,2]))
# output = True

# testcase 3
print (valley([17,1,2,3,4,5]))
# output = True
