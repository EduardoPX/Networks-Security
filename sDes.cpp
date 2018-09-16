#include <iostream>
#include <iterator>

//int p10(int ** V)
//{
//
//}

int main()
{

int p10[10] = {3, 5, 2, 7, 4, 10, 1, 9, 8, 6};
int p8[10] = {6, 3, 7, 4, 8, 5, 10, 9};
int count;

//=== Variables auxiliar

char date[10];  // 10bits to encrypt
char k1[3];     // p8 left bits
char k2[3];     // p8 rigth bits
char LS_1[5];   // p10 left bits
char LS_2[5];   // p10 rigth bits
char temp[10];  // date bits permutation

/// send bits 10 bits to encrypt
std::cout << "Insert 10 bit: ";
std::cin >> date;
date[10] = '\0';
std::cout << date << std::endl;

/// applying p10 vector permutation in date bits
for(auto i {0}; i < 10; ++i)
{
    count = p10[i];
    temp[i] = date[count - 1];
}
temp[10] = '\0';
std::cout << temp << std::endl;

for(int i = 0; i < 5; ++i)
{
    if(i == 4)
    {
        LS_1[i] = temp[0];
    }

    else
    {
        LS_1[i] = temp[i + 1];
    }
}
std::cout << "LS-1" << LS_1 << std::endl;

for(int i = 0; i < 5; ++i)
{
    if(i == 4)
    {
        LS_2[i] = temp[0];
    }

    else
    {
        LS_2[i] = temp[i + 1];
    }
}
std::cout << "LS-2" << LS_2 << std::endl;

//==> Appling p8
//for(int i = 0; i < 8; ++i)

    return 0;
}
