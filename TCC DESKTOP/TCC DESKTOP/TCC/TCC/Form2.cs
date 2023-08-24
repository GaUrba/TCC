using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;
namespace TCC
{
    public partial class Form2 : Form
    {
        Thread nt;
        public Form2()
        {
            InitializeComponent();
        }

        private void Form2_Load(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
            nt = new Thread(novoForm7);
            nt.SetApartmentState(ApartmentState.STA);
            nt.Start();
        }
        private void novoForm7()
        {
            Application.Run(new Form7());
        }

        private void button3_Click(object sender, EventArgs e)
        {
            this.Close();
            nt = new Thread(novoForm4);
            nt.SetApartmentState(ApartmentState.STA);
            nt.Start();
        }
        private void novoForm4()
        {
            Application.Run(new Form4());
        }

        private void button1_Click(object sender, EventArgs e)
        {
        }


        private void button4_Click(object sender, EventArgs e)
        {
            this.Close();
            nt = new Thread(novoForm6);
            nt.SetApartmentState(ApartmentState.STA);
            nt.Start();
        }
        private void novoForm6()
        {
            Application.Run(new Form6());
        }
    }
    
    }
  

