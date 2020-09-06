import java.util.*;
class Average implements Numbers
{
    public int process(int num1, int num2)
    {
        int average  = (num1 + num2)/2 ;
        return average;
    }
    
    public static void main(String args[])
    {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the two number");
        int a = sc.nextInt();
        int b = sc.nextInt();
        Average ob = new Average();
        System.out.println("the average of the two numbers are");
        System.out.println(ob.process(a,b));
    }
}
