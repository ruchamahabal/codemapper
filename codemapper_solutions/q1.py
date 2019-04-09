def prime_list(l):
    result=[]
    flag = 0
    for i in l:
        for j in range(2,i):
            if i%j!=0:
                flag = 1
            else:
                flag = 0
                break
        if flag == 1 or i==2 :
            if i not in result:
                result.append(i)
    return result

#testcase fails when there is repetition in list

# sample testcases
# test case 1
print(prime_list([2,3,6,7]))
# output 1 = [2, 3, 7]

# testcase 2
print(prime_list([4,6,8,10]))
# output 2 = []

# testcase 3
print(prime_list([44,71,356,1032]))
# output 3 = [71]

# hidden testcases
# testcase 1
print(prime_list([2,3,3,6,7,2]))
# output 1 = [2, 3, 7]

# testcase 2
print(prime_list([5,6,9,8,5,6,9,8]))
# output = [5]

# testcase 3
print(prime_list([]))
# output 3 = []
