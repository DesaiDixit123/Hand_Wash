<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\MarketArea;
use App\Models\TeamMember;
use App\Models\SeoSetting;
use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // 1. Seed Permissions
        $permissions = [
            ['name' => 'Manage Banners', 'slug' => 'manage_banners', 'description' => 'Create, edit, delete slides.'],
            ['name' => 'Manage Categories', 'slug' => 'manage_categories', 'description' => 'Create, edit, delete categories.'],
            ['name' => 'Manage Products', 'slug' => 'manage_products', 'description' => 'Create, edit, delete products.'],
            ['name' => 'Manage Inquiries', 'slug' => 'manage_inquiries', 'description' => 'View and moderate inquiries.'],
            ['name' => 'Manage Blogs', 'slug' => 'manage_blogs', 'description' => 'Manage articles and blog categories.'],
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'description' => 'Update website settings and SEO tags.'],
            ['name' => 'Manage Gallery', 'slug' => 'manage_gallery', 'description' => 'Manage media gallery images.'],
            ['name' => 'Manage Team', 'slug' => 'manage_team', 'description' => 'Manage team members.'],
            ['name' => 'Manage Market Areas', 'slug' => 'manage_market_areas', 'description' => 'Manage network states.'],
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'description' => 'Manage system accounts.']
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(['slug' => $p['slug']], $p);
        }

        // 2. Seed Roles
        $adminRole = Role::firstOrCreate(['slug' => 'admin'], [
            'name' => 'Administrator',
            'description' => 'Full control over the system.'
        ]);

        $editorRole = Role::firstOrCreate(['slug' => 'editor'], [
            'name' => 'Content Editor',
            'description' => 'Can manage products, categories, blogs, and gallery.'
        ]);

        $adminRole->permissions()->sync(Permission::all());
        $editorRole->permissions()->sync(
            Permission::whereIn('slug', ['manage_banners', 'manage_categories', 'manage_products', 'manage_blogs', 'manage_gallery'])->get()
        );

        // 3. Default Admin
        User::firstOrCreate(['email' => 'Director@sreechemicals.com'], [
            'name' => 'Dimple Patel',
            'password' => Hash::make('AdminPassword123!'),
            'role_id' => $adminRole->id,
            'email_verified_at' => now()
        ]);

        // 4. Website Settings
        $settings = [
            'company_name' => 'Sree Chemicals',
            'logo_path' => '/assets/images/logo.png',
            'email' => 'Director@sreechemicals.com',
            'phone' => '+91 87586 78787',
            'whatsapp' => '+91 87586 78787',
            'address' => '124, Nexus-1, Uttarsanda Road, Nadiad, Gujarat, India',
            'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14716.208453472147!2d72.8532468!3d22.6891045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e5b3252069cb1%3A0xe54e60155b998cfb!2sNadiad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1717235282000!5m2!1sen!2sin',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'linkedin_url' => 'https://linkedin.com',
            'youtube_url' => 'https://youtube.com',
            'about_intro' => 'Sree Chemicals is a leading manufacturer of premium, industrial-grade and household cleaning products, dedicated to hygiene, safety, and sustainable environmental care.',
            'about_mission' => 'To deliver state-of-the-art cleaning solutions that ensure ultimate hygiene while maintaining eco-friendly formulations.',
            'about_vision' => 'To become the global standard in cleaning chemical manufacture, empowering homes and industries with premium quality products.',
            'about_experience' => 'Excellence in Quality',
            'about_history' => 'Sree Chemicals operates a state-of-the-art automated manufacturing facility in Nadiad, Gujarat serving over 500+ dealers nationwide and supplying premium cleaning solutions to major industrial hubs.'
        ];

        foreach ($settings as $key => $val) {
            WebsiteSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }

        // 5. Banners
        Banner::truncate();
        Banner::create([
            'title' => 'Industrial & Household Cleaning Solutions For Modern Businesses',
            'subtitle' => 'Professional cleaning chemicals and hygiene solutions manufactured with international quality standards.',
            'image_path' => '/assets/images/banner1.jpg',
            'button_text' => 'Explore Products',
            'button_link' => '/products',
            'sort_order' => 1,
            'status' => true
        ]);

        // 6. SEO Settings
        SeoSetting::truncate();
        $seoPages = [
            'home' => ['title' => 'Sree Chemicals - Premium Cleaning Products Manufacturer', 'desc' => 'Leading manufacturer of premium household hand washes, detergents, and industrial cleaning chemicals. Discover high-quality sanitation.'],
            'about' => ['title' => 'About Sree Chemicals - Leading Cleaner Manufacturer', 'desc' => 'Learn about Sree Chemicals history, vision, mission, state-of-the-art infrastructure, and quality assurance benchmarks.'],
            'products' => ['title' => 'Our Premium Cleaning Products Range - Sree Chemicals', 'desc' => 'Explore our complete list of cleaning chemicals: Hand Wash, Dish Wash, Liquid Detergents, Black/White Cleaners, and Industrial formulations.'],
            'gallery' => ['title' => 'Sree Chemicals Media Gallery - Factory, Products & Events', 'desc' => 'Browse photos of our advanced automated chemical manufacturing facility, quality laboratory, team members, and events.'],
            'market-area' => ['title' => 'Market Coverage & Dealer Network - Sree Chemicals', 'desc' => 'See our active dealer footprint and market area coverage across India. Interactive maps and state-wide dealer directory.'],
            'blog' => ['title' => 'Sree Chemicals Hygiene Blog - Sanitation Tips & Corporate News', 'desc' => 'Read our latest posts on home sanitization guidelines, industrial degreasing best practices, and new product launch announcements.'],
            'contact' => ['title' => 'Contact Sree Chemicals - Nadiad Office & Factory', 'desc' => 'Get in touch with Sree Chemicals for custom manufacturing, bulk orders, and queries. Call, email, or WhatsApp us.'],
            'dealer-registration' => ['title' => 'Become a Sree Chemicals Authorized Dealer - Apply Online', 'desc' => 'Register as an authorized retail dealer of Sree Chemicals Cleaning Products. High margins, exclusive rights, and sales support.'],
            'distributor-registration' => ['title' => 'Become a Sree Chemicals Distributor - Distribution Form', 'desc' => 'Apply to become a state/district level distributor. Join India\'s premier cleaning chemicals supply chain network.']
        ];

        foreach ($seoPages as $page => $data) {
            SeoSetting::create([
                'page_name' => $page,
                'meta_title' => $data['title'],
                'meta_description' => $data['desc'],
                'keywords' => 'hand wash, dish wash, cleaning chemicals manufacturer, floor cleaner, industrial chemicals, Nadiad chemicals',
                'canonical_url' => 'http://localhost/' . ($page === 'home' ? '' : $page),
                'og_image_path' => '/assets/images/og-image.jpg'
            ]);
        }

        // 7. Seed Categories (Only 5 Categories as per user requirement)
        Category::truncate();
        $categories = [
            ['name' => 'Hand Wash', 'slug' => 'hand-wash', 'desc' => 'Moisturizing Hand Wash Gel - Powerful protection & gentle care, keeping your hands germ-free.', 'img' => '/assets/images/orvin-handwash.png'],
            ['name' => 'Dish Washer', 'slug' => 'dish-washer', 'desc' => 'Concentrated Dish Washer Liquid - Removes grease & tough stains for sparkling clean utensils.', 'img' => '/assets/images/orvin-dish.png'],
            ['name' => 'Toilet Cleaner', 'slug' => 'toilet-cleaner', 'desc' => 'Concentrated Toilet Cleaner - Eliminates tough stains & kills 99.9% of germs.', 'img' => '/assets/images/orvin-toilet.png'],
            ['name' => 'Floor Cleaner', 'slug' => 'floor-cleaner', 'desc' => 'Concentrated Floor Cleaner - Keeps germs away with clean & fresh formula killing 99.9% of germs.', 'img' => '/assets/images/orvin-floor.png'],
            ['name' => 'Washing Liquid', 'slug' => 'washing-liquid', 'desc' => 'Washing Liquid Front & Top Load - Tough on stains & odors, brightens and freshens clothes.', 'img' => '/assets/images/orvin-laundry.png'],
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[$cat['slug']] = Category::create([
                'name' => $cat['name'],
                'slug' => $cat['slug'],
                'short_description' => $cat['desc'],
                'image_path' => $cat['img']
            ]);
        }

        // 8. Seed Products (Only 5 Products as per user requirement)
        Product::truncate();
        ProductImage::truncate();
        
        $productsSeed = [
            [
                'category_slug' => 'hand-wash',
                'name' => 'Orvin Hand Wash Gel',
                'slug' => 'orvin-hand-wash-gel',
                'short' => 'Moisturizing Hand Wash Gel with 100% natural formula. Powerful protection and gentle care.',
                'desc' => 'A Drop of this mean boy unleashes the power of a germ-fighting kraken. A powerful gel concentrate with naturally-derived, bio-degradable ingredients that doesn\'t just clean but moisturizes too.',
                'specs' => ['Formula' => '100% Natural Gel Concentrate', 'Protection' => 'Kills 99% of Germs', 'Fragrance' => 'Different Fragrances Available', 'Skin Care' => 'Moisturizing & Gentle Care'],
                'features' => ['Keep your hands germ-free', 'Powerful Protection, Gentle Care', 'Kills 99% of Germs', '100% Natural Formula'],
                'benefits' => ['Cleans and moisturizes hands simultaneously', 'Naturally-derived, bio-degradable ingredients', 'Different fragrances available'],
                'apps' => ['Home washrooms and kitchens', 'Offices, restaurants, and hotels'],
                'img' => '/assets/images/orvin-handwash.png'
            ],
            [
                'category_slug' => 'dish-washer',
                'name' => 'Orvin Dish Washer Gel',
                'slug' => 'orvin-dish-washer-gel',
                'short' => 'Concentrated Dish Washer Liquid. Removes grease & tough stains for sparkling shine.',
                'desc' => 'A Drop of this mean boy unleashes the power of a germ-fighting kraken. A powerful gel concentrate with naturally-derived, bio-degradable ingredients that doesn\'t just clean but moisturizes too.',
                'specs' => ['Formula' => '100% Natural Concentrated Liquid', 'Cleaning' => 'Removes Grease & Tough Stains', 'Fragrance' => 'Different Fragrances Available', 'Finish' => 'Sparkling Shine, Gentle on Hands'],
                'features' => ['Removes Grease & Tough Stains', 'Sparkling Shine, Gentle on Hands', 'Powerful Formula for Everyday Cleaning', '100% Natural Formula'],
                'benefits' => ['Easily cuts through tough grease and burnt food', 'Gentle on hands without harsh irritation', 'Leaves dishes sparkling clean'],
                'apps' => ['Everyday kitchen utensil cleaning', 'Glassware, cookware, and ceramic plates'],
                'img' => '/assets/images/orvin-dish.png'
            ],
            [
                'category_slug' => 'toilet-cleaner',
                'name' => 'Orvin Toilet Cleaner',
                'slug' => 'orvin-toilet-cleaner',
                'short' => 'Concentrated Toilet Cleaner. Eliminates tough stains & kills 99.9% of germs.',
                'desc' => 'A Drop of this mean boy unleashes the power of a germ-fighting kraken. A powerful gel concentrate with naturally-derived, bio-degradable ingredients that doesn\'t just clean but moisturizes too.',
                'specs' => ['Protection' => 'Kills 99.9% of Germs', 'Formula' => 'Advanced Formula Ultra Deep Clean', 'Action' => 'Eliminates Tough Stains', 'Fragrance' => 'Fresh Sanitizing Fragrance'],
                'features' => ['Eliminates Tough Stains & 99.9% of Germs', 'Advanced Formula Ultra Deep Clean', 'Ultra Deep Clean Action', 'Fresh Fragrance'],
                'benefits' => ['Eliminates stubborn toilet stains and limescale', 'Kills 99.9% of germs instantly', 'Deep sanitizing action'],
                'apps' => ['Residential toilet bowls and urinals', 'Commercial and corporate washrooms'],
                'img' => '/assets/images/orvin-toilet.png'
            ],
            [
                'category_slug' => 'floor-cleaner',
                'name' => 'Orvin Floor Cleaner',
                'slug' => 'orvin-floor-cleaner',
                'short' => 'Concentrated Floor Cleaner. Keeps germs away and kills 99.9% of germs & bacteria.',
                'desc' => 'A Drop of this mean boy unleashes the power of a germ-fighting kraken. A powerful gel concentrate with naturally-derived, bio-degradable ingredients that doesn\'t just clean but moisturizes too.',
                'specs' => ['Protection' => 'Kills 99.9% of Germs & Bacteria', 'Formula' => 'Clean & Fresh Disinfectant', 'Fragrance' => 'Different Fragrances Available', 'Surface' => 'Safe for All Floor Types'],
                'features' => ['Keep the Germs Away', 'Clean & Fresh Action', 'Kills 99% of Germs & Bacteria', 'Different Fragrances Available'],
                'benefits' => ['Leaves floors spotless with long-lasting freshness', 'Kills 99.9% of bacteria and germs', 'Safe on tile, marble, and granite'],
                'apps' => ['Marble, tile, granite, and mosaic floors', 'Homes, offices, and commercial establishments'],
                'img' => '/assets/images/orvin-floor.png'
            ],
            [
                'category_slug' => 'washing-liquid',
                'name' => 'Orvin Washing Liquid (Front & Top Load)',
                'slug' => 'orvin-washing-liquid',
                'short' => 'Washing Liquid for Front & Top Load machines. Tough on stains & odors, kills 99.9% of germs.',
                'desc' => 'A Drop of this mean boy unleashes the power of a germ-fighting kraken. A powerful gel concentrate with naturally-derived, bio-degradable ingredients that doesn\'t just clean but moisturizes too.',
                'specs' => ['Compatibility' => 'Front Load & Top Load Machines', 'Protection' => 'Kills 99.9% of Germs', 'Action' => 'Tough on Stains & Odors', 'Care' => 'Brightens & Freshens Clothes'],
                'features' => ['Tough on Stains & Odors', 'Brightens & Freshens Clothes', 'Perfect for Top Load & Front Load Machines', 'Kills 99.9% of Germs'],
                'benefits' => ['Dissolves quickly with zero powdery residue', 'Brightens whites and protects colored fabrics', 'Leaves clothes fresh and fragrant'],
                'apps' => ['Top Load & Front Load automatic washing machines', 'Hand washing delicate clothes'],
                'img' => '/assets/images/orvin-laundry.png'
            ]
        ];

        foreach ($productsSeed as $p) {
            $cat = $catModels[$p['category_slug']] ?? null;
            if ($cat) {
                $prod = Product::create([
                    'category_id' => $cat->id,
                    'name' => $p['name'],
                    'slug' => $p['slug'],
                    'short_description' => $p['short'],
                    'description' => $p['desc'],
                    'specifications' => $p['specs'],
                    'features' => $p['features'],
                    'benefits' => $p['benefits'],
                    'applications' => $p['apps'],
                    'brochure_path' => null,
                    'status' => true
                ]);

                // Create primary image
                ProductImage::create([
                    'product_id' => $prod->id,
                    'image_path' => $p['img'],
                    'is_primary' => true
                ]);
            }
        }

        // 9. Seed Testimonials
        Testimonial::truncate();
        Testimonial::create([
            'client_name' => 'Rajesh Sharma',
            'designation' => 'Procurement Manager, Hotel Blue Diamond',
            'review' => 'We have been sourcing Dish Wash Liquid and Floor Cleaners from Sree Chemicals for the last 3 years. The consistency in quality is remarkable, and their bulk prices have helped us optimize our housekeeping costs significantly.',
            'client_image' => '/assets/images/user1.jpg',
            'rating' => 5
        ]);
        Testimonial::create([
            'client_name' => 'Ananya Patel',
            'designation' => 'Distributor, Patel Enterprises',
            'review' => 'As a district distributor, I appreciate Sree Chemicals\' timely delivery and excellent promotional support. Their products, especially the PineFresh White Phenyl, have become household favorites in our market.',
            'client_image' => '/assets/images/user2.jpg',
            'rating' => 5
        ]);

        // 10. Seed FAQs
        Faq::truncate();
        Faq::create([
            'question' => 'Do you manufacture eco-friendly and biodegradable cleaning products?',
            'answer' => 'Yes, all our household cleaning products (including hand washes and detergents) are formulated using biodegradable surfactants and organic active ingredients that do not pollute waterways. They are free from phosphates, parabens, and nonylphenol.',
            'sort_order' => 1
        ]);
        Faq::create([
            'question' => 'What is the minimum order quantity (MOQ) for dealer/distributor supply?',
            'answer' => 'For authorized dealerships, our minimum starting order is ₹50,000, and for exclusive district distributorships, the initial order value begins at ₹2,00,000. Full details are sent upon reviewing your registration request.',
            'sort_order' => 2
        ]);
        Faq::create([
            'question' => 'Do you provide material safety data sheets (MSDS) for industrial cleaning chemicals?',
            'answer' => 'Yes, we provide comprehensive MSDS and Technical Data Sheets (TDS) for all our industrial degreasers, solvents, and manufacturing floor chemicals. These can be downloaded from the product detail page or obtained via email.',
            'sort_order' => 3
        ]);

        // 11. Blog Categories & Blogs
        BlogCategory::truncate();
        Blog::truncate();
        $bcat = BlogCategory::create([
            'name' => 'Sanitation & Hygiene',
            'slug' => 'sanitation-hygiene'
        ]);
        $bcat2 = BlogCategory::create([
            'name' => 'Industrial Safety',
            'slug' => 'industrial-safety'
        ]);

        Blog::create([
            'blog_category_id' => $bcat->id,
            'title' => 'Benefits of Liquid Detergent vs. Powder Detergent',
            'slug' => 'benefits-liquid-detergent-vs-powder',
            'content' => '<p>Learn why modern commercial laundromats and households are transitioning to liquid detergents. Liquid detergents dissolve fully at any water temperature, leave zero chalky residue on dark clothes, and are pre-dissolved for immediate deep stain action.</p>',
            'image_path' => '/assets/images/blog1.jpg',
            'author_name' => 'Dr. Amit Trivedi (Head Chemist)',
            'status' => true,
            'published_at' => now()->subDays(5)
        ]);

        Blog::create([
            'blog_category_id' => $bcat2->id,
            'title' => 'Industrial Cleaning Best Practices in Automotive Workshops',
            'slug' => 'industrial-cleaning-best-practices-workshops',
            'content' => '<p>Automotive service floors require specialized cleaning formulations to break down thick deposits of mineral oils, gear greases, and tire grit safely. We review the dilution protocols and safety standards for handling alkaline industrial degreasers.</p>',
            'image_path' => '/assets/images/blog2.jpg',
            'author_name' => 'Prakash Mehta (Plant Operator)',
            'status' => true,
            'published_at' => now()->subDays(10)
        ]);

        // 12. Seed Gallery
        Gallery::truncate();
        Gallery::create(['title' => 'Automated Liquid Filling Line', 'image_path' => '/assets/images/gallery/factory-filling.jpg', 'type' => 'factory']);
        Gallery::create(['title' => 'Quality Control Chemical Lab', 'image_path' => '/assets/images/gallery/factory-lab.jpg', 'type' => 'factory']);
        Gallery::create(['title' => 'Product Batch 104 Packaging', 'image_path' => '/assets/images/gallery/product-pkg.jpg', 'type' => 'product']);
        Gallery::create(['title' => 'Our Core Research Team', 'image_path' => '/assets/images/gallery/team-rnd.jpg', 'type' => 'team']);
        Gallery::create(['title' => 'Annual Industry Chem Exhibition 2025', 'image_path' => '/assets/images/gallery/event-expo.jpg', 'type' => 'event']);

        // 13. Seed Market Areas
        MarketArea::truncate();
        MarketArea::create(['state' => 'Gujarat', 'city' => 'Vadodara', 'dealer_count' => 105, 'details' => 'HQ and Main Formulation Plant. 105 authorized retail dealer outlets and 2 central inventory warehouses.']);
        MarketArea::create(['state' => 'Maharashtra', 'city' => 'Mumbai', 'dealer_count' => 85, 'details' => 'Regional Supply Hub. 85 active dealers and 8 primary wholesale stockists.']);
        MarketArea::create(['state' => 'Delhi', 'city' => 'New Delhi', 'dealer_count' => 50, 'details' => 'North India corporate supply hub. 50 retail dealers.']);
        MarketArea::create(['state' => 'Karnataka', 'city' => 'Bengaluru', 'dealer_count' => 40, 'details' => 'South India warehousing partner. 40 dealers.']);
        MarketArea::create(['state' => 'Rajasthan', 'city' => 'Jaipur', 'dealer_count' => 30, 'details' => 'Semi-urban retail network. 30 dealers.']);

        // 14. Seed Team Members
        TeamMember::truncate();
        TeamMember::create([
            'name' => 'Suresh V. Desai',
            'designation' => 'Founder & Managing Director',
            'image_path' => '/assets/images/team-suresh.jpg',
            'bio' => 'Suresh has over 30 years of industrial experience in chemical formulations.',
            'linkedin_url' => 'https://linkedin.com',
            'sort_order' => 1
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
