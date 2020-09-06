import java.util.*;
interface Numbers
{
    int process(int x, int y);
}


class Sum implements Numbers
{
    public int process(int num1, int num2)
    {
        int summation  = num1 + num2 ;
        return summation;
    }
    
    public static void main(String args[])
    {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the two number");
        int a = sc.nextInt();
        int b = sc.nextInt();
        Sum ob = new Sum();
        System.out.println("the sum of the two numbers are");
        System.out.println(ob.process(a,b));
    }
}
        
